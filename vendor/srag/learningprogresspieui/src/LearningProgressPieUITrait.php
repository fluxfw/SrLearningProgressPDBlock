<?php

namespace srag\LearningProgressPieUI\SrLearningProgressPDBlock;

/**
 * Trait LearningProgressPieUITrait
 *
 * @package srag\LearningProgressPieUI\SrLearningProgressPDBlock
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
