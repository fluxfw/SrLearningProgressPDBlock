<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop;

use ilSrLearningProgressPDBlockPlugin;

/**
 * Class PersonalDesktopBlock53
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class PersonalDesktopBlock53 extends BasePersonalDesktopBlock
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
