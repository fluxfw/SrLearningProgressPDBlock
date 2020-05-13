<?php

use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ilSrLearningProgressPDBlockUIHookGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrLearningProgressPDBlockUIHookGUI extends ilUIHookPluginGUI
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const COMPONENT_PERSONAL_DESKTOP = "Services/PersonalDesktop";
    const COMPONENT_CONTAINER = "Services/Container";
    const COMPONENT_DASHBOARD = "Services/Dashboard";
    const PART_RIGHT_COLUMN = "right_column";


    /**
     * @inheritDoc
     */
    public function getHTML(/*string*/ $a_comp, /*string*/ $a_part, $a_par = []) : array
    {

        if (($a_comp === self::COMPONENT_PERSONAL_DESKTOP || $a_comp === self::COMPONENT_DASHBOARD) && $a_part === self::PART_RIGHT_COLUMN) {

            return [
                "mode" => self::PREPEND,
                "html" => self::output()->getHTML(self::srLearningProgressPDBlock()->blocks()->factory()->dashboard())
            ];
        }

        if (self::dic()->ctrl()->getCmdClass() === strtolower(ilObjCourseGUI::class) && $a_comp === self::COMPONENT_CONTAINER && $a_part === self::PART_RIGHT_COLUMN) {

            return [
                "mode" => self::PREPEND,
                "html" => self::output()->getHTML(self::srLearningProgressPDBlock()->blocks()->factory()->courses())
            ];
        }

        return parent::getHTML($a_comp, $a_part, $a_par);
    }
}
