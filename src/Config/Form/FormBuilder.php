<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config\Form;

use ilSrLearningProgressPDBlockPlugin;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\FormBuilder\AbstractFormBuilder;
use srag\Plugins\SrLearningProgressPDBlock\Config\ConfigCtrl;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class FormBuilder
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class FormBuilder extends AbstractFormBuilder
{

    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const KEY_SHOW_ON_DASHBOARD = "show_on_personal_desktop";
    const KEY_SHOW_ON_COURSES = "show_on_courses";


    /**
     * @inheritDoc
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
    protected function getButtons() : array
    {
        $buttons = [
            ConfigCtrl::CMD_UPDATE_CONFIGURE => self::plugin()->translate("save", ConfigCtrl::LANG_MODULE)
        ];

        return $buttons;
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = [
            self::KEY_SHOW_ON_DASHBOARD => self::srLearningProgressPDBlock()->config()->getValue(self::KEY_SHOW_ON_DASHBOARD),
            self::KEY_SHOW_ON_COURSES   => self::srLearningProgressPDBlock()->config()->getValue(self::KEY_SHOW_ON_COURSES)
        ];

        return $data;
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = [
            self::KEY_SHOW_ON_DASHBOARD => self::dic()->ui()->factory()->input()->field()->checkbox(self::plugin()->translate("dashboard", ConfigCtrl::LANG_MODULE)),
            self::KEY_SHOW_ON_COURSES   => self::dic()->ui()->factory()->input()->field()->checkbox(self::plugin()->translate("courses", ConfigCtrl::LANG_MODULE))
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function getTitle() : string
    {
        return self::plugin()->translate("configuration", ConfigCtrl::LANG_MODULE);
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data)/* : void*/
    {
        self::srLearningProgressPDBlock()->config()->setValue(self::KEY_SHOW_ON_DASHBOARD, boolval($data[self::KEY_SHOW_ON_DASHBOARD]));
        self::srLearningProgressPDBlock()->config()->setValue(self::KEY_SHOW_ON_COURSES, boolval($data[self::KEY_SHOW_ON_COURSES]));
    }
}
