<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop;

use srag\Plugins\SrLearningProgressPDBlock\Block\BaseBlock;

/**
 * Class BasePersonalDesktopBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class BasePersonalDesktopBlock extends BaseBlock
{

    /**
     * @inheritDoc
     */
    protected function enabled() : bool
    {
        return true;
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
