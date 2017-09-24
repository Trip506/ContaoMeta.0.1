<?php

/**
 * This file is part of MetaModels/filter_tags.
 *
 * (c) 2012-2017 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage FilterTags
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Christian de la Haye <service@delahaye.de>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/filter_tags/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

/**
 * Filter types.
 */
$GLOBALS['TL_LANG']['tl_metamodel_filtersetting']['typenames']['tags'] = 'Multi selection';

/**
 * Fields.
 */
$GLOBALS['TL_LANG']['tl_metamodel_filtersetting']['useor'][0] = 'OR';
$GLOBALS['TL_LANG']['tl_metamodel_filtersetting']['useor'][1] =
    'OR-linking of the tags. Is automatically set if the attribute is aselect-type.';