<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\SrLearningProgressPDBlock\Config\Config;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;
use srag\RemovePluginDataConfirm\SrLearningProgressPDBlock\PluginUninstallTrait;

/**
 * Class ilSrLearningProgressPDBlockPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrLearningProgressPDBlockPlugin extends ilUserInterfaceHookPlugin {

	use PluginUninstallTrait;
	use SrLearningProgressPDBlockTrait;
	const PLUGIN_ID = "srlppd";
	const PLUGIN_NAME = "SrLearningProgressPDBlock";
	const PLUGIN_CLASS_NAME = self::class;
	const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = SrLearningProgressPDBlockRemoveDataConfirm::class;
	/**
	 * @var self|null
	 */
	protected static $instance = NULL;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * ilSrLearningProgressPDBlockPlugin constructor
	 */
	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}


	/**
	 * @inheritdoc
	 */
	protected function deleteData()/*: void*/ {
		self::dic()->database()->dropTable(Config::TABLE_NAME, false);
	}
}
