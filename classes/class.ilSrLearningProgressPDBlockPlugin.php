<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;
use srag\RemovePluginDataConfirm\SrLearningProgressPDBlock\PluginUninstallTrait;

/**
 * Class ilSrLearningProgressPDBlockPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrLearningProgressPDBlockPlugin extends ilUserInterfaceHookPlugin
{

    use PluginUninstallTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_ID = "srlppd";
    const PLUGIN_NAME = "SrLearningProgressPDBlock";
    const PLUGIN_CLASS_NAME = self::class;
    /**
     * @var self|null
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
     * ilSrLearningProgressPDBlockPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function updateLanguages(/*?array*/ $a_lang_keys = null)/*:void*/
    {
        parent::updateLanguages($a_lang_keys);

        $this->installRemovePluginDataConfirmLanguages();
    }


    /**
     * @inheritDoc
     */
    protected function deleteData()/*: void*/
    {
        self::srLearningProgressPDBlock()->dropTables();
    }
}
