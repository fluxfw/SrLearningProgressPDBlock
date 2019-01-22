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
	protected $ref_ids = [];


	/**
	 * BaseBlock constructor
	 */
	public function __construct() {
		parent::__construct();

		$this->initBlock();
	}


	/**
	 *
	 */
	protected function initBlock()/*: void*/ {
		self::dic()->mainTemplate()->addCss(self::plugin()->directory() . "/css/srlearningprogresspdblock.css");

		self::dic()->mainTemplate()->addJavaScript(self::plugin()->directory() . "/node_modules/d3/dist/d3.min.js");

		$this->setTitle(self::plugin()->translate("learning_progress", self::LANG_MODULE_BLOCK));

		$this->initRefIds();

		self::dic()->language()->loadLanguageModule("trac");
	}


	/**
	 *
	 */
	public function fillDataSection()/*: void*/ {
		$courses = array_reduce($this->ref_ids, function (array $data, int $obj_id): array {
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

		$tpl = self::plugin()->template("chart.html", false, false);

		$tpl->setVariable("DATA", json_encode($data));
		$tpl->setVariable("COUNT", count($this->ref_ids));

		$this->setDataSection(self::output()->getHTML($tpl));
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
	 *
	 */
	protected abstract function initRefIds()/*: void*/
	;
}
