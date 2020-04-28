<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Access;

use ilDBConstants;
use ilObjUser;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Courses
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Access
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Courses
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
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
     * Courses constructor
     */
    private function __construct()
    {

    }


    /**
     * @param ilObjUser $user
     *
     * @return int[]
     */
    public function getCoursesOfUser(ilObjUser $user) : array
    {
        $result = self::dic()->database()->queryF("SELECT obj_id FROM obj_members WHERE usr_id=%s AND (admin=%s OR tutor=%s OR member=%s)", [
            ilDBConstants::T_INTEGER,
            ilDBConstants::T_INTEGER,
            ilDBConstants::T_INTEGER,
            ilDBConstants::T_INTEGER
        ], [
            $user->getId(),
            1,
            1,
            1
        ]);

        $obj_ids = [];

        while (($row = $result->fetchAssoc()) !== false) {
            $obj_ids[] = intval($row["obj_id"]);
        }

        return $obj_ids;
    }
}
