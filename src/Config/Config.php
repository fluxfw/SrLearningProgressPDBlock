<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

use ilSrLearningProgressPDBlockPlugin;
use srag\ActiveRecordConfig\SrLearningProgressPDBlock\ActiveRecordConfig;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class Config
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class Config extends ActiveRecordConfig
{

    use SrLearningProgressPDBlockTrait;
    const TABLE_NAME = "srlppd_config";
    /**
     * @var string
     *
     * @deprecated
     */
    const TABLE_NAME_WRONG = "ui_uihk_srlppd_config";
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const KEY_SHOW_ON_COURSES = "show_on_courses";
    const KEY_SHOW_ON_PERSONAL_DESKTOP = "show_on_personal_desktop";
    /**
     * @var array
     */
    protected static $fields
        = [
            self::KEY_SHOW_ON_COURSES          => [self::TYPE_BOOLEAN, true],
            self::KEY_SHOW_ON_PERSONAL_DESKTOP => [self::TYPE_BOOLEAN, true]
        ];
}
