<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilCheckboxInputGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\ActiveRecordConfigFormGUI;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends ActiveRecordConfigFormGUI
{

    use SrLearningProgressPDBlockTrait;
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const CONFIG_CLASS_NAME = Config::class;


    /**
     * @inheritdoc
     */
    protected function initFields()/*: void*/
    {
        $this->fields = [
            Config::KEY_SHOW_ON_PERSONAL_DESKTOP => [
                self::PROPERTY_CLASS => ilCheckboxInputGUI::class,
                "setTitle"           => self::dic()->language()->txt("personal_desktop")
            ],
            Config::KEY_SHOW_ON_COURSES          => [
                self::PROPERTY_CLASS => ilCheckboxInputGUI::class,
                "setTitle"           => self::dic()->language()->txt("repository")
            ]
        ];
    }
}
