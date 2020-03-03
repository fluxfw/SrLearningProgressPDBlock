<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\Courses;

use ilSrLearningProgressPDBlockPlugin;

/**
 * Class CoursesBlock54
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\Courses
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CoursesBlock54 extends BaseCoursesBlock
{

    /**
     * @return string
     */
    public function getBlockType() : string
    {
        return ilSrLearningProgressPDBlockPlugin::PLUGIN_ID;
    }


    /**
     * @return bool
     */
    protected function isRepositoryObject() : bool
    {
        return false;
    }
}
