<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilBlockGUI;
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
		self::dic()->mainTemplate()->addJavaScript(self::plugin()->directory() . "/node_modules/d3/dist/d3.min.js");
		self::dic()->mainTemplate()->addJavaScript(self::plugin()->directory() . "/node_modules/d3-legend/d3.legend.js");

		$this->setTitle("TODO");

		$this->initRefIds();
	}


	/**
	 *
	 */
	public function fillDataSection()/*: void*/ {
		$data = array_map(function (int $obj_id): array {
			$status = self::ilias()->learningProgress(self::dic()->user())->getStatus($obj_id);

			return [
				"label" => "fhjdhfjdf",
				"color" => LearningProgress::LP_STATUS_COLOR[$status]
			];
		}, $this->ref_ids);

		$tpl = self::plugin()->template("chart.html", false, false);

		$tpl->setVariable("DATA", json_encode($data));

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
