<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Access;

use ilObjUser;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Ilias
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Access
 */
final class Ilias
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Ilias constructor
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
     * @return Courses
     */
    public function courses() : Courses
    {
        return Courses::getInstance();
    }


    /**
     * @param ilObjUser $user
     *
     * @return LearningProgress
     */
    public function learningProgress(ilObjUser $user) : LearningProgress
    {
        return LearningProgress::getInstance($user);
    }
}
