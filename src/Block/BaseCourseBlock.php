<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilLPCollection;
use ilObjectLP;

/**
 * Class BaseCourseBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class BaseCourseBlock extends BaseBlock {

	const GET_PARAM_REF_ID = "ref_id";
	const GET_PARAM_TARGET = "target";
	/**
	 * @var int
	 */
	protected $course_ref_id;
	/**
	 * @var int
	 */
	protected $course_obj_id;


	/**
	 * CourseBlock constructor
	 */
	public function __construct() {
		$this->course_ref_id = $this->filterRefId();
		$this->course_obj_id = intval(self::dic()->objDataCache()->lookupObjId($this->course_ref_id));

		parent::__construct();
	}


	/**
	 * @inheritdoc
	 */
	protected function enabled(): bool {
		return self::ilias()->learningProgress(self::dic()->user())->enabled($this->course_obj_id);
	}


	/**
	 * @inheritdoc
	 */
	protected function initObjIds()/*: void*/ {
		/**
		 * @var ilObjectLP $lp
		 */
		$lp = ilObjectLP::getInstance($this->course_obj_id);
		/**
		 * @var ilLPCollection $c
		 */
		$c = $lp->getCollectionInstance();

		if (method_exists($c, "getPossibleItems")) { // Abstraction?!
			$this->obj_ids = array_map(function (int $ref_id): int {
				return intval(self::dic()->objDataCache()->lookupObjId($ref_id));
			}, array_filter($c->getPossibleItems($this->course_ref_id), function (int $ref_id) use ($c): bool {
				return $c->isAssignedEntry($ref_id);
			}));
		}
	}


	/**
	 * @inheritdoc
	 */
	protected function initTitle()/*: void*/ {
		$this->setTitle(self::dic()->language()->txt("trac_learning_progress"));
	}


	/**
	 * @return int|null
	 */
	private function filterRefId()/*: ?int*/ {
		$obj_ref_id = filter_input(INPUT_GET, self::GET_PARAM_REF_ID);

		if ($obj_ref_id === NULL) {
			$param_target = filter_input(INPUT_GET, self::GET_PARAM_TARGET);

			$obj_ref_id = explode("_", $param_target)[1];
		}

		$obj_ref_id = intval($obj_ref_id);

		if ($obj_ref_id > 0) {
			return $obj_ref_id;
		} else {
			return NULL;
		}
	}
}
