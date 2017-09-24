<?php

/**
 * This file is part of MetaModels/attribute_text.
 *
 * (c) 2012-2017 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage AttributeText
 * @author     Christopher Boelter <christopher@boelter.eu>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2017 The MetaModels team.
 * @license    https://github.com/MetaModels/attribute_text/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

use MetaModels\Attribute\Events\CreateAttributeFactoryEvent;
use MetaModels\Attribute\Text\AttributeTypeFactory;
use MetaModels\MetaModelsEvents;
use MetaModels\Events\MetaModelsBootEvent;
use MetaModels\Attribute\Text\BackendSubscriber;

return array
(
    MetaModelsEvents::SUBSYSTEM_BOOT_BACKEND => array(
        function (MetaModelsBootEvent $event) {
            new BackendSubscriber($event->getServiceContainer());
        }
    ),
    MetaModelsEvents::ATTRIBUTE_FACTORY_CREATE => array(
        function (CreateAttributeFactoryEvent $event) {
            $factory = $event->getFactory();
            $factory->addTypeFactory(new AttributeTypeFactory());
        }
    )
);
