<?php

/**
 * This file is part of MetaModels/core.
 *
 * (c) 2012-2017 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/core/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

$GLOBALS['TL_LANG']['tl_module']['mm_filter_legend']                  = 'MetaModel Filter';
$GLOBALS['TL_LANG']['tl_module']['mm_meta_legend']                    = 'Search engine optimization';
$GLOBALS['TL_LANG']['tl_module']['metamodel'][0]                      = 'MetaModel';
$GLOBALS['TL_LANG']['tl_module']['metamodel'][1]                      = 'The MetaModel to list in this listing.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_use_limit'][0]            = 'Use offset and limit for listing';
$GLOBALS['TL_LANG']['tl_module']['metamodel_use_limit'][1]            =
    'Check if you want to limit the amount of items listed. This is useful for only showing the first 500 items or ' .
    'all excluding the first 10 items but keep pagination intact.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_offset'][0]               = 'List offset';
$GLOBALS['TL_LANG']['tl_module']['metamodel_offset'][1]               =
    'Please specify the offset value (i.e. 10 to skip the first 10 items).';
$GLOBALS['TL_LANG']['tl_module']['metamodel_limit'][0]                = 'Maximum number of items';
$GLOBALS['TL_LANG']['tl_module']['metamodel_limit'][1]                =
    'Please enter the maximum number of items. Enter 0 to show all items and therefore disable the pagination.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sortby'][0]               = 'Order by';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sortby'][1]               = 'Please choose the sort order.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sortby_direction'][0]     = 'Order by direction';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sortby_direction'][1]     = 'Ascending or descending order.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sort_override'][0]        = 'Allow sort override';
$GLOBALS['TL_LANG']['tl_module']['metamodel_sort_override'][1]        =
    'If checked, the sorting attribute and direction may be overridden via get parameter.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_filtering'][0]            = 'Filter settings to apply';
$GLOBALS['TL_LANG']['tl_module']['metamodel_filtering'][1]            =
    'Select the filter settings that shall get applied when compiling the list.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_layout'][0]               = 'Custom template to use for generating';
$GLOBALS['TL_LANG']['tl_module']['metamodel_layout'][1]               =
    'Select the template that shall be used for the selected attribute. ' .
    'Valid template filenames start with "ce_metamodel".';
$GLOBALS['TL_LANG']['tl_module']['metamodel_rendersettings'][0]       = 'Render settings to apply';
$GLOBALS['TL_LANG']['tl_module']['metamodel_rendersettings'][1]       =
    'Select the rendering settings to use for generating the output. ' .
    'If left empty, the default settings for the selected MetaModel will get applied. ' .
    'If no default has been defined, the output will only get the raw values.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_noparsing'][0]            = 'No parsing of items';
$GLOBALS['TL_LANG']['tl_module']['metamodel_noparsing'][1]            =
    'If this checkbox is selected, the module will not parse the items. ' .
    'Only the item objects will be available in the template.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_donotindex'][0]           = 'Do not add to search index';
$GLOBALS['TL_LANG']['tl_module']['metamodel_donotindex'][1]           =
    'If this is checked, the Contao internal search index will ignore the content of this content element.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_filterparams'][0]         = 'Filter parameter override';
$GLOBALS['TL_LANG']['tl_module']['metamodel_filterparams_use_get'][0] = 'Use GET Parameter';
$GLOBALS['TL_LANG']['tl_module']['metamodel_filterparams_use_get'][1] = '';
$GLOBALS['TL_LANG']['tl_module']['metamodel_jumpTo'][0]               = 'Redirect page';
$GLOBALS['TL_LANG']['tl_module']['metamodel_jumpTo'][1]               =
    'Please choose the page to which visitors will be redirected when clicking a link or submitting a form.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_params'][0]           = 'Attributes';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_params'][1]           =
    'Select the attributes used in this frontend filter.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_template'][0]         = 'Template';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_template'][1]         = 'Select frontend template.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_autosubmit'][0]       = 'Submit on change';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_autosubmit'][1]       = 'Reload page on filter change.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_hideclearfilter'][0]  = 'Hide clear filter option';
$GLOBALS['TL_LANG']['tl_module']['metamodel_fef_hideclearfilter'][1]  = 'Hide the clear filter option in every filter.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_available_values'][0]     = 'Filter counter';
$GLOBALS['TL_LANG']['tl_module']['metamodel_available_values'][1]     =
    'Display the amount of available entries behind each filter option.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_meta_title'][0]           = 'Meta Title';
$GLOBALS['TL_LANG']['tl_module']['metamodel_meta_title'][1]           =
    'Set this attribute as the meta-title of the page.';
$GLOBALS['TL_LANG']['tl_module']['metamodel_meta_description'][0]     = 'Meta Description';
$GLOBALS['TL_LANG']['tl_module']['metamodel_meta_description'][1]     =
    'Set this attribute as the meta-description of the page.';
$GLOBALS['TL_LANG']['tl_module']['editmetamodel'][0]                  = 'Edit MetaModel';
$GLOBALS['TL_LANG']['tl_module']['editmetamodel'][1]                  = 'Edit the MetaModel ID %s.';
$GLOBALS['TL_LANG']['tl_module']['editrendersetting'][0]              = 'Edit render setting';
$GLOBALS['TL_LANG']['tl_module']['editrendersetting'][1]              = 'Edit the render setting ID %s.';
$GLOBALS['TL_LANG']['tl_module']['editfiltersetting'][0]              = 'Edit filter setting';
$GLOBALS['TL_LANG']['tl_module']['editfiltersetting'][1]              = 'Edit the filter setting ID %s.';
