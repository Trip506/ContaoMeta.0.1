<?php

/*
 * ce-access Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2017, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-ce-access
 */

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = preg_replace('@([,;])(modules[,;])@', '$1elements,$2', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['elements'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['elements'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'options_callback'        => array('CeAccess', 'getContentElements'),
    'reference'               => &$GLOBALS['TL_LANG']['CTE'],
    'eval'                    => array('multiple'=>true),
);
