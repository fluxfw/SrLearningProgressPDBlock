<?php

namespace srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config;

use srag\DIC\SrLearningProgressPDBlock\DICTrait;

/**
 * Class AbstractFactory
 *
 * @package srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config
 */
abstract class AbstractFactory
{

    use DICTrait;

    /**
     * AbstractFactory constructor
     */
    protected function __construct()
    {

    }


    /**
     * @return Config
     */
    public function newInstance() : Config
    {
        $config = new Config();

        return $config;
    }
}
