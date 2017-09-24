<?php

/**
 * This file is part of MetaModels/filter_select.
 *
 * (c) 2012-2016 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage FilterSelect
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2016 The MetaModels team.
 * @license    https://github.com/MetaModels/filter_select/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

use MetaModels\Filter\Setting\Events\CreateFilterSettingFactoryEvent;
use MetaModels\Filter\Setting\SelectFilterSettingTypeFactory;
use MetaModels\MetaModelsEvents;

return array
(
    MetaModelsEvents::FILTER_SETTING_FACTORY_CREATE => array(
        function (CreateFilterSettingFactoryEvent $event) {
            $event->getFactory()->addTypeFactory(new SelectFilterSettingTypeFactory());
        }
    )
);
