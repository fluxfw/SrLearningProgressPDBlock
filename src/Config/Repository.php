<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilSrLearningProgressPDBlockPlugin;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\AbstractFactory;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\AbstractRepository;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\Config;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository extends AbstractRepository
{

    use SrLearningProgressPDBlockTrait;
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
    protected function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     *
     * @return Factory
     */
    public function factory() : AbstractFactory
    {
        return Factory::getInstance();
    }


    /**
     * @inheritDoc
     */
    protected function getTableName() : string
    {
        return ilSrLearningProgressPDBlockPlugin::PLUGIN_ID . "_config";
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        return [
            ConfigFormGUI::KEY_SHOW_ON_COURSES          => [Config::TYPE_BOOLEAN, true],
            ConfigFormGUI::KEY_SHOW_ON_PERSONAL_DESKTOP => [Config::TYPE_BOOLEAN, true]
        ];
    }
}
