<?php

namespace srag\DIC\SrLearningProgressPDBlock\DIC;

use ILIAS\DI\Container;
use srag\DIC\SrLearningProgressPDBlock\Database\DatabaseDetector;
use srag\DIC\SrLearningProgressPDBlock\Database\DatabaseInterface;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC\SrLearningProgressPDBlock\DIC
 */
abstract class AbstractDIC implements DICInterface
{

    /**
     * @var Container
     */
    protected $dic;


    /**
     * @inheritDoc
     */
    public function __construct(Container &$dic)
    {
        $this->dic = &$dic;
    }


    /**
     * @inheritDoc
     */
    public function database() : DatabaseInterface
    {
        return DatabaseDetector::getInstance($this->databaseCore());
    }
}
