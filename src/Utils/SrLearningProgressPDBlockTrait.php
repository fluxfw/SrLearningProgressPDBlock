<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Utils;

use srag\Plugins\SrLearningProgressPDBlock\Access\Access;
use srag\Plugins\SrLearningProgressPDBlock\Access\Ilias;

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
     * @return Access
     */
    protected static function access() : Access
    {
        return Access::getInstance();
    }


    /**
     * @return Ilias
     */
    protected static function ilias() : Ilias
    {
        return Ilias::getInstance();
    }
}
