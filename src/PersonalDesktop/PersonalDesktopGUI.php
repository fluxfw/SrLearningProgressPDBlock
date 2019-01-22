<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Search;

use ilBlockGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class PersonalDesktopGUI
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Search
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class PersonalDesktopGUI extends ilBlockGUI {

	use DICTrait;
	use SrLearningProgressPDBlockTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;


	/**
	 * PersonalDesktopGUI constructor
	 */
	public function __construct() {
		parent::__construct();

		$this->initBlock();
	}


	/**
	 *
	 */
	protected function initBlock()/*: void*/ {
		$this->setTitle("TODO");
	}


	/**
	 *
	 */
	public function fillDataSection()/*: void*/ {
		$this->setDataSection("TODO");
	}


	/**
	 * @return string
	 */
	public static function getBlockType(): string {
		return ilSrLearningProgressPDBlockPlugin::PLUGIN_ID;
	}


	/**
	 * @return bool
	 */
	public static function isRepositoryObject(): bool {
		return false;
	}
}
