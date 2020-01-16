<?php

namespace srag\ActiveRecordConfig\SrLearningProgressPDBlock\Utils;

use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\Repository as ConfigRepository;

/**
 * Trait ConfigTrait
 *
 * @package srag\ActiveRecordConfig\SrLearningProgressPDBlock\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait ConfigTrait
{

    /**
     * @return ConfigRepository
     */
    protected static function config() : ConfigRepository
    {
        return ConfigRepository::getInstance();
    }
}
