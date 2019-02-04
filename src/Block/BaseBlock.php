<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilBlockGUI;
use ilLPStatus;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Access\LearningProgress;
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
		self::dic()->language()->loadLanguageModule("trac");

		self::dic()->mainTemplate()->addCss(self::plugin()->directory() . "/css/srlearningprogresspdblock.css");

		self::dic()->mainTemplate()->addJavaScript(self::plugin()->directory() . "/node_modules/d3/dist/d3.min.js");

		$this->initTitle();

		$this->initObjIds();
	}


	/**
	 *
	 */
	public function fillDataSection()/*: void*/ {
		$courses = array_reduce($this->obj_ids, function (array $data, int $obj_id): array {
			$status = self::ilias()->learningProgress(self::dic()->user())->getStatus($obj_id);

			if (!isset($data[$status])) {
				$data[$status] = 0;
			}

			$data[$status] ++;

			return $data;
		}, []);

		$data = array_map(function (int $status) use ($courses): array {
			return [
				"color" => LearningProgress::LP_STATUS_COLOR[$status],
				"label" => $courses[$status],
				"title" => self::ilias()->learningProgress(self::dic()->user())->getText($status),
				"value" => $courses[$status]
			];
		}, [
			ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM,
			ilLPStatus::LP_STATUS_IN_PROGRESS_NUM,
			ilLPStatus::LP_STATUS_COMPLETED_NUM,
			ilLPStatus::LP_STATUS_FAILED_NUM
		]);

		$data = array_values(array_filter($data, function (array $data): bool {
			return ($data["value"] > 0);
		}));

		if (count($data) > 0) {
			$tpl = self::plugin()->template("chart.html", false, false);

			$tpl->setVariable("DATA", json_encode($data));
			$tpl->setVariable("COUNT", count($this->obj_ids));

			$this->setDataSection(self::output()->getHTML($tpl));
		} else {
			$this->setDataSection(self::plugin()->translate("none", self::LANG_MODULE_BLOCK));
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
