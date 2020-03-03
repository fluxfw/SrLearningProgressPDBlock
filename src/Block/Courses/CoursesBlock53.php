<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\Courses;

use ilSrLearningProgressPDBlockPlugin;

/**
 * Class CoursesBlock53
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\Courses
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CoursesBlock53 extends BaseCoursesBlock
{

    /**
     * @return string
     */
    public static function getBlockType() : string
    {
        return ilSrLearningProgressPDBlockPlugin::PLUGIN_ID;
    }


    /**
     * @return bool
     */
    public static function isRepositoryObject() : bool
    {
        return false;
    }
}
