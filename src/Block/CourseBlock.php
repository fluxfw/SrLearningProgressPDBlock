<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilLPCollection;
use ilObject;
use ilObjectLP;

/**
 * Class CourseBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CourseBlock extends BaseBlock {

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
		$this->course_ref_id = intval(filter_input(INPUT_GET, "ref_id"));
		$this->course_obj_id = intval(ilObject::_lookupObjectId($this->course_ref_id));

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
				return intval(ilObject::_lookupObjectId($ref_id));
			}, array_filter($c->getPossibleItems($this->course_ref_id), function (int $ref_id) use ($c): bool {
				return $c->isAssignedEntry($ref_id);
			}));
		}
	}


	/**
	 * @inheritdoc
	 */
	protected function initTitle()/*: void*/ {
		$this->setTitle(self::plugin()->translate("learning_progress", self::LANG_MODULE_BLOCK));
	}
}
