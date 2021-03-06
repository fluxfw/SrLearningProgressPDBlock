<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Access;

use ilObject;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Access
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Access
 */
final class Access
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Access constructor
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
     * @param int $obj_id
     *
     * @return bool
     */
    public function hasReadAccess(int $obj_id) : bool
    {
        return self::dic()->access()->checkAccess("read", "", current(ilObject::_getAllReferences($obj_id)));
    }
}
