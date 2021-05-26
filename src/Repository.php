<?php

namespace srag\Plugins\SrLearningProgressPDBlock;

use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Access\Access;
use srag\Plugins\SrLearningProgressPDBlock\Access\Ilias;
use srag\Plugins\SrLearningProgressPDBlock\Block\Repository as BlocksRepository;
use srag\Plugins\SrLearningProgressPDBlock\Config\Repository as ConfigRepository;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrLearningProgressPDBlock
 */
final class Repository
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Repository constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @return Access
     */
    public function access() : Access
    {
        return Access::getInstance();
    }


    /**
     * @return BlocksRepository
     */
    public function blocks() : BlocksRepository
    {
        return BlocksRepository::getInstance();
    }


    /**
     * @return ConfigRepository
     */
    public function config() : ConfigRepository
    {
        return ConfigRepository::getInstance();
    }


    /**
     *
     */
    public function dropTables()/*:void*/
    {
        $this->blocks()->dropTables();
        $this->config()->dropTables();
    }


    /**
     * @return Ilias
     */
    public function ilias() : Ilias
    {
        return Ilias::getInstance();
    }


    /**
     *
     */
    public function installTables()/*:void*/
    {
        $this->blocks()->installTables();
        $this->config()->installTables();
    }
}
