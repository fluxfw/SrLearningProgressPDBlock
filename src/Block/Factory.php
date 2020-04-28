<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Block\Courses\BaseCoursesBlock;
use srag\Plugins\SrLearningProgressPDBlock\Block\Courses\CoursesBlock53;
use srag\Plugins\SrLearningProgressPDBlock\Block\Courses\CoursesBlock54;
use srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop\BasePersonalDesktopBlock;
use srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop\PersonalDesktopBlock53;
use srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop\PersonalDesktopBlock54;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Factory
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Factory
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
     * Factory constructor
     */
    private function __construct()
    {

    }


    /**
     * @return BasePersonalDesktopBlock
     */
    public function personalDesktop() : BasePersonalDesktopBlock
    {
        if (self::version()->is54()) {
            $block = new PersonalDesktopBlock54();
        } else {
            $block = new PersonalDesktopBlock53();
        }

        return $block;
    }


    /**
     * @return BaseCoursesBlock
     */
    public function courses() : BaseCoursesBlock
    {
        if (self::version()->is54()) {
            $block = new CoursesBlock54();
        } else {
            $block = new CoursesBlock53();
        }

        return $block;
    }
}
