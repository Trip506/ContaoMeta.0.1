<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @copyright  Daniel Gaussmann 2011-2015
 * @author     Daniel Gaussmann <mail@gausi.de>
 * @package    CalendarEditor 
 * @license    GNU/LGPL 
 */


/**
 * Class ModuleEventReaderEdit 
 */
class ModuleEventReaderEdit extends Events
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_event_ReaderEditLink';
	
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE') {
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### EVENT READER EDIT LINK ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		// Return if no event has been specified
		if (!$this->Input->get('events')) {
			return '';
		}
		
		$this->cal_calendar = $this->sortOutProtected(deserialize($this->cal_calendar));

		// Return if there are no calendars
		if (!is_array($this->cal_calendar) || count($this->cal_calendar) < 1)
		{
			return '';
		}
		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->Template = new FrontendTemplate($this->strTemplate);
		$this->Template->editRef = '';
		
		// FE user is logged in
		$this->import('FrontendUser', 'User');
		
		// Get current event
		$objEvent = $this->Database->prepare("SELECT *, author AS authorId, (SELECT title FROM tl_calendar WHERE tl_calendar.id=tl_calendar_events.pid) AS calendar, (SELECT name FROM tl_user WHERE id=author) author FROM tl_calendar_events WHERE pid IN(" . implode(',', array_map('intval', $this->cal_calendar)) . ") AND (id=? OR alias=?)" . (!BE_USER_LOGGED_IN ? " AND (start='' OR start<?) AND (stop='' OR stop>?) AND published=1" : ""))
								   ->limit(1)
								   ->execute((is_numeric($this->Input->get('events')) ? $this->Input->get('events') : 0), $this->Input->get('events'), $time, $time);

		if ($objEvent->numRows < 1) {				
			$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_NoEditAllowed'];
			$this->Template->error_class = 'error';			
			return;
		}
		
		// get Calender with PID
		$pid = $objEvent->pid;
		$objCalendar = $this->Database->prepare("SELECT * FROM tl_calendar WHERE id=?")
                         			->limit(1)
									->execute($pid);

									
		if ($objCalendar->numRows < 1) {
			return; // No calendar found
		}
		
		if ($objCalendar->AllowEdit) {
			// Calendar allows editing
			// check user rights			
			if (!$objCalendar->caledit_loginRequired) {
				// even not registered user are allowed to edit events						
				$AuthorizedUser = TRUE;
			} else {
				// Get Groups which are allowed to edit events in this calendar
				if (!FE_USER_LOGGED_IN) {							
					$AuthorizedUser = FALSE;
				} else {
					$groups = deserialize($objCalendar->caledit_groups);
					if (!is_array($groups) || count($groups) < 1 || count(array_intersect($groups, $this->User->groups)) < 1){						
						$AuthorizedUser = FALSE;
					}
					else {	
						$AuthorizedUser = TRUE;
					}
				}
			}
			
			// Get Admin-Groups which are allowed to edit events in this calendar
			// (Admins are allowed to edit events even if the "only owner"-setting is checked)
			if (!FE_USER_LOGGED_IN) {
				// an unregistered user is NOT an admin
				$UserIsAdmin = FALSE;
			} else {
				$admin_groups = deserialize($objCalendar->caledit_adminGroup);
				if (!is_array($admin_groups) || count($admin_groups) < 1 || count(array_intersect($admin_groups, $this->User->groups)) < 1){						
					$UserIsAdmin = FALSE;
				}
				else {					
					$UserIsAdmin = TRUE;
				}
			}
			

			if (($AuthorizedUser || $UserIsAdmin ) && !$objEvent->disable_editing)
			{
				// user is allowed to edit events, and the current one is not blocked by a backend-user
				$currentTime = time();
				
				// the user is authorized or an admin, the event is not blocked
				$generalPermission = (($UserIsAdmin) || (!$objCalendar->caledit_onlyUser))
									||
									($objEvent->FE_User == $this->User->id);
				
				if ($currentTime <= $objEvent->startTime){
					// event is in the future
					$AddEditLinks = $generalPermission;
				} else {
					// event is in the past
					$AddEditLinks = ((!$objCalendar->caledit_onlyFuture) && $generalPermission) || ($UserIsAdmin) ;
				}								
			} else {
				$generalPermission = FALSE;
				$AddEditLinks = FALSE;
			}
			
			if ($AddEditLinks) {				
				// get the JumpToEdit-Page for this calendar
				$objPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=(SELECT caledit_jumpTo FROM tl_calendar WHERE id=?)")
								  ->limit(1)
								  ->execute($objCalendar->id);
				if ($objPage->numRows) {
					$strUrl = $this->generateFrontendUrl($objPage->row(), '');
				}
				else {
					$strUrl = $this->Environment->request;	
				}
					
				$this->Template->editRef = $strUrl.'?edit='.$objEvent->id;
				$this->Template->editLabel = $GLOBALS['TL_LANG']['MSC']['caledit_editLabel'];
				$this->Template->editTitle = $GLOBALS['TL_LANG']['MSC']['caledit_editTitle'];
				
				if ($this->caledit_showCloneLink) {
					$this->Template->cloneRef = $strUrl.'?clone='.$objEvent->id;
					$this->Template->cloneLabel = $GLOBALS['TL_LANG']['MSC']['caledit_cloneLabel'];
					$this->Template->cloneTitle = $GLOBALS['TL_LANG']['MSC']['caledit_cloneTitle'];
				}
				if ($this->caledit_showDeleteLink) {
					$this->Template->deleteRef = $strUrl.'?delete='.$objEvent->id;
					$this->Template->deleteLabel = $GLOBALS['TL_LANG']['MSC']['caledit_deleteLabel'];
					$this->Template->deleteTitle = $GLOBALS['TL_LANG']['MSC']['caledit_deleteTitle'];
				}

			} else {
				if (!$AuthorizedUser) {
					$this->Template->error_class = 'error';
					$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_UnauthorizedUser'];
					return;
				}
				
				if ($objEvent->disable_editing) {
					// the event is locked in the backend
					$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_DisabledEvent'];
					$this->Template->error_class = 'error';
				} else {
					if ($generalPermission) {
						// the user is authorized, but the event has elapsed
						$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_NoPast'];
						$this->Template->error_class = 'error';
					} else {
						// the user is NOT authorized at all (reason: only the creator can edit it)						
						$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_OnlyUser'];
						$this->Template->error_class = 'error';
					}
				}
			}		
		} else {
			$this->Template->error_class = 'error';
			$this->Template->error = $GLOBALS['TL_LANG']['MSC']['caledit_NoEditAllowed'];
			return ;
		}		
	}
}

?>