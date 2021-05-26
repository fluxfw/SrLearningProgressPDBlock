<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Utils;

use srag\Plugins\SrLearningProgressPDBlock\Repository;

/**
 * Trait SrLearningProgressPDBlockTrait
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Utils
 */
trait SrLearningProgressPDBlockTrait
{

    /**
     * @return Repository
     */
    protected static function srLearningProgressPDBlock() : Repository
    {
        return Repository::getInstance();
    }
}
