<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop;

use ilSrLearningProgressPDBlockPlugin;

/**
 * Class PersonalDesktopBlock54
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktop
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class PersonalDesktopBlock54 extends BasePersonalDesktopBlock
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
