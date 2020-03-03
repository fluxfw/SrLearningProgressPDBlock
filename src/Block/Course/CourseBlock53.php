<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\Course;

use ilSrLearningProgressPDBlockPlugin;

/**
 * Class CourseBlock53
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\Course
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CourseBlock53 extends BaseCourseBlock
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
