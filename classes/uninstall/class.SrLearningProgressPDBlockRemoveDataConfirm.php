<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;
use srag\RemovePluginDataConfirm\SrLearningProgressPDBlock\AbstractRemovePluginDataConfirm;

/**
 * Class SrLearningProgressPDBlockRemoveDataConfirm
 *
 * @author            studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy SrLearningProgressPDBlockRemoveDataConfirm: ilUIPluginRouterGUI
 */
class SrLearningProgressPDBlockRemoveDataConfirm extends AbstractRemovePluginDataConfirm {

	use SrLearningProgressPDBlockTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
}
