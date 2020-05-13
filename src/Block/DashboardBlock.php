<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use srag\Plugins\SrLearningProgressPDBlock\Config\Form\FormBuilder;

/**
 * Class DashboardBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class DashboardBlock extends BaseBlock
{

    /**
     * @inheritDoc
     */
    protected function enabled() : bool
    {
        return self::srLearningProgressPDBlock()->config()->getValue(FormBuilder::KEY_SHOW_ON_DASHBOARD);
    }


    /**
     * @inheritDoc
     */
    protected function initObjIds()/*: void*/
    {
        $this->obj_ids = self::srLearningProgressPDBlock()->ilias()->courses()->getCoursesOfUser(self::dic()->user());
    }


    /**
     * @inheritDoc
     */
    protected function initTitle()/*: void*/
    {
        $this->setTitle(self::plugin()->translate("learning_progress", self::LANG_MODULE) . " " . self::plugin()->translate("my_courses", self::LANG_MODULE));
    }
}
