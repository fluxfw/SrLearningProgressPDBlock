<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilSrLearningProgressPDBlockConfigGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Config\AbstractFactory;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Factory
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Factory extends AbstractFactory
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
     * Factory constructor
     */
    protected function __construct()
    {
        parent::__construct();
    }


    /**
     * @param ilSrLearningProgressPDBlockConfigGUI $parent
     *
     * @return ConfigFormGUI
     */
    public function newFormInstance(ilSrLearningProgressPDBlockConfigGUI $parent) : ConfigFormGUI
    {
        $form = new ConfigFormGUI($parent);

        return $form;
    }
}
