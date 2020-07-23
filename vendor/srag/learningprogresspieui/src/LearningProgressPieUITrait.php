<?php

namespace srag\LearningProgressPieUI\SrLearningProgressPDBlock;

/**
 * Trait LearningProgressPieUITrait
 *
 * @package srag\LearningProgressPieUI\SrLearningProgressPDBlock
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait LearningProgressPieUITrait
{

    /**
     * @return Factory
     */
    protected static function learningProgressPieUI() : Factory
    {
        return Factory::getInstance();
    }
}
