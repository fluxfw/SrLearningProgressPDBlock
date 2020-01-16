<?php

namespace srag\Plugins\SrLearningProgressPDBlock;

use ilSrLearningProgressPDBlockPlugin;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\Config;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\Repository as ConfigRepository;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Utils\ConfigTrait;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Access\Access;
use srag\Plugins\SrLearningProgressPDBlock\Access\Ilias;
use srag\Plugins\SrLearningProgressPDBlock\Config\ConfigFormGUI;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrLearningProgressPDBlock
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;
    use ConfigTrait {
        config as protected _config;
    }
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    /**
     * @var self
     */
    protected static $instance = null;


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
     * Repository constructor
     */
    private function __construct()
    {
        $this->config()->withTableName(ilSrLearningProgressPDBlockPlugin::PLUGIN_ID . "_config")->withFields([
            ConfigFormGUI::KEY_SHOW_ON_COURSES          => [Config::TYPE_BOOLEAN, true],
            ConfigFormGUI::KEY_SHOW_ON_PERSONAL_DESKTOP => [Config::TYPE_BOOLEAN, true]
        ]);
    }


    /**
     * @return Access
     */
    public function access() : Access
    {
        return Access::getInstance();
    }


    /**
     * @inheritDoc
     */
    public function config() : ConfigRepository
    {
        return self::_config();
    }


    /**
     *
     */
    public function dropTables()/*:void*/
    {
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
        $this->config()->installTables();
    }
}
