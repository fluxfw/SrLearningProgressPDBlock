<?php

use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Config\ConfigFormGUI;
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
    const PERSONAL_DESKTOP_INIT = "personal_desktop";
    const COURSES_INIT = "courses";
    const COMPONENT_PERSONAL_DESKTOP = "Services/PersonalDesktop";
    const COMPONENT_CONTAINER = "Services/Container";
    const PART_RIGHT_COLUMN = "right_column";
    /**
     * @var bool[]
     */
    protected static $load
        = [
            self::PERSONAL_DESKTOP_INIT => false,
            self::COURSES_INIT          => false
        ];


    /**
     * @inheritDoc
     */
    public function getHTML(/*string*/ $a_comp, /*string*/ $a_part, $a_par = []) : array
    {

        self::dic()->language()->loadLanguageModule("trac");

        if (!self::$load[self::PERSONAL_DESKTOP_INIT]) {

            if (self::srLearningProgressPDBlock()->config()->getValue(ConfigFormGUI::KEY_SHOW_ON_PERSONAL_DESKTOP)) {

                if ($a_comp === self::COMPONENT_PERSONAL_DESKTOP && $a_part === self::PART_RIGHT_COLUMN) {

                    self::$load[self::PERSONAL_DESKTOP_INIT] = true;

                    return [
                        "mode" => self::PREPEND,
                        "html" => self::output()->getHTML(self::srLearningProgressPDBlock()->blocks()->factory()->personalDesktop())
                    ];
                }
            }
        }

        if (!self::$load[self::COURSES_INIT]) {

            if (self::srLearningProgressPDBlock()->config()->getValue(ConfigFormGUI::KEY_SHOW_ON_COURSES)) {

                if (self::dic()->ctrl()->getCmdClass() === strtolower(ilObjCourseGUI::class) && $a_comp === self::COMPONENT_CONTAINER
                    && $a_part === self::PART_RIGHT_COLUMN
                ) {

                    self::$load[self::COURSES_INIT] = true;

                    return [
                        "mode" => self::PREPEND,
                        "html" => self::output()->getHTML(self::srLearningProgressPDBlock()->blocks()->factory()->course())
                    ];
                }
            }
        }

        return parent::getHTML($a_comp, $a_part, $a_par);
    }
}
