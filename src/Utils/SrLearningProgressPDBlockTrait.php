<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Utils;

use srag\Plugins\SrLearningProgressPDBlock\Repository;

/**
 * Trait SrLearningProgressPDBlockTrait
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
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
