<?php

namespace srag\Plugins\SrLearningProgressPDBlock;

use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Access\Access;
use srag\Plugins\SrLearningProgressPDBlock\Access\Ilias;
use srag\Plugins\SrLearningProgressPDBlock\Config\Config;
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

    }


    /**
     * @return Access
     */
    public function access() : Access
    {
        return Access::getInstance();
    }


    /**
     *
     */
    public function dropTables()/*:void*/
    {
        self::dic()->database()->dropTable(Config::TABLE_NAME, false);
        self::dic()->database()->dropTable(Config::TABLE_NAME_WRONG, false);
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
        if (self::dic()->database()->tableExists(Config::TABLE_NAME_WRONG)) {
            self::dic()->database()->dropTable(Config::TABLE_NAME, false);

            self::dic()
                ->database()
                ->renameTable(Config::TABLE_NAME_WRONG, Config::TABLE_NAME);

            Config::updateDB();
        } else {
            Config::updateDB();
        }
    }
}
