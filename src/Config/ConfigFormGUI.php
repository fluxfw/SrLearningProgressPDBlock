<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilCheckboxInputGUI;
use ilSrLearningProgressPDBlockConfigGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\PropertyFormGUI\ConfigPropertyFormGUI;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends ConfigPropertyFormGUI
{

    use SrLearningProgressPDBlockTrait;
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const CONFIG_CLASS_NAME = Config::class;
    const LANG_MODULE = ilSrLearningProgressPDBlockConfigGUI::LANG_MODULE;


    /**
     * ConfigFormGUI constructor
     *
     * @param ilSrLearningProgressPDBlockConfigGUI $parent
     */
    public function __construct(ilSrLearningProgressPDBlockConfigGUI $parent)
    {
        parent::__construct($parent);
    }


    /**
     * @inheritDoc
     */
    protected function initCommands()/*: void*/
    {
        $this->addCommandButton(ilSrLearningProgressPDBlockConfigGUI::CMD_UPDATE_CONFIGURE, $this->txt("save"));
    }


    /**
     * @inheritDoc
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


    /**
     * @inheritDoc
     */
    protected function initId()/*: void*/
    {

    }


    /**
     * @inheritDoc
     */
    protected function initTitle()/*: void*/
    {
        $this->setTitle($this->txt("configuration"));
    }
}
