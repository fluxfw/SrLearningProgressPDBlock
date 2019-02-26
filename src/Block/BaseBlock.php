<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilBlockGUI;
use ilSrLearningProgressPDBlockPlugin;
use ilTemplateException;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\CustomInputGUIsTrait;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\DIC\SrLearningProgressPDBlock\Exception\DICException;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class BaseBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class BaseBlock extends ilBlockGUI {

	use DICTrait;
	use SrLearningProgressPDBlockTrait;
	use CustomInputGUIsTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
	const LANG_MODULE_BLOCK = "block";
	/**
	 * @var int[]
	 */
	protected $obj_ids = [];


	/**
	 * BaseBlock constructor
	 */
	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return string
	 */
	public function getHTML(): string {
		if ($this->enabled()) {
			$this->initBlock();

			return parent::getHTML();
		} else {
			return "";
		}
	}


	/**
	 *
	 */
	protected function initBlock()/*: void*/ {
		$this->initTitle();

		$this->initObjIds();
	}


	/**
	 * @throws DICException
	 * @throws ilTemplateException
	 */
	public function fillDataSection()/*: void*/ {
		$obj_ids = array_filter($this->obj_ids, function (int $obj_id): bool {
			return self::access()->hasReadAccess($obj_id);
		});

		$pie = self::output()->getHTML(self::customInputGUIs()->learningProgressPie()->objIds()->withObjIds($obj_ids)->withUsrId(self::dic()->user()
			->getId())->withId(self::getBlockType())->withShowLegend(true));

		if (!empty($pie)) {
			$this->setDataSection($pie);
		} else {
			$this->setDataSection(self::dic()->language()->txt("none"));
		}
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


	/**
	 * @return bool
	 */
	protected abstract function enabled(): bool;


	/**
	 *
	 */
	protected abstract function initObjIds()/*: void*/
	;


	/**
	 *
	 */
	protected abstract function initTitle()/*: void*/
	;
}
