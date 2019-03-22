<?php

use srag\ActiveRecordConfig\SrLearningProgressPDBlock\ActiveRecordConfigGUI;
use srag\Plugins\SrLearningProgressPDBlock\Config\ConfigFormGUI;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ilSrLearningProgressPDBlockConfigGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrLearningProgressPDBlockConfigGUI extends ActiveRecordConfigGUI {

	use SrLearningProgressPDBlockTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
	/**
	 * @var array
	 */
	protected static $tabs = [ self::TAB_CONFIGURATION => ConfigFormGUI::class ];
}
