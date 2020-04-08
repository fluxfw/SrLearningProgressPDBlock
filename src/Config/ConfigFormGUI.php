<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilCheckboxInputGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\PropertyFormGUI\PropertyFormGUI;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends PropertyFormGUI
{

    use SrLearningProgressPDBlockTrait;
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const KEY_SHOW_ON_COURSES = "show_on_courses";
    const KEY_SHOW_ON_PERSONAL_DESKTOP = "show_on_personal_desktop";
    const LANG_MODULE = ConfigCtrl::LANG_MODULE;


    /**
     * ConfigFormGUI constructor
     *
     * @param ConfigCtrl $parent
     */
    public function __construct(ConfigCtrl $parent)
    {
        parent::__construct($parent);
    }


    /**
     * @inheritDoc
     */
    protected function getValue(/*string*/ $key)
    {
        switch ($key) {
            default:
                return self::srLearningProgressPDBlock()->config()->getValue($key);
        }
    }


    /**
     * @inheritDoc
     */
    protected function initCommands()/*: void*/
    {
        $this->addCommandButton(ConfigCtrl::CMD_UPDATE_CONFIGURE, $this->txt("save"));
    }


    /**
     * @inheritDoc
     */
    protected function initFields()/*: void*/
    {
        $this->fields = [
            self::KEY_SHOW_ON_PERSONAL_DESKTOP => [
                self::PROPERTY_CLASS => ilCheckboxInputGUI::class,
                "setTitle"           => $this->txt("personal_desktop")
            ],
            self::KEY_SHOW_ON_COURSES          => [
                self::PROPERTY_CLASS => ilCheckboxInputGUI::class,
                "setTitle"           => $this->txt("courses")
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


    /**
     * @inheritDoc
     */
    protected function storeValue(/*string*/ $key, $value)/*: void*/
    {
        switch ($key) {
            default:
                self::srLearningProgressPDBlock()->config()->setValue($key, $value);
                break;
        }
    }
}
