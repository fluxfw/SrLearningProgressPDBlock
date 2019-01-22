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
	 * @inheritdoc
	 */
	protected function initObjIds()/*: void*/ {
		$course_ref_id = intval(filter_input(INPUT_GET, "ref_id"));
		$course_obj_id = intval(ilObject::_lookupObjectId($course_ref_id));

		/**
		 * @var ilObjectLP $lp
		 */
		$lp = ilObjectLP::getInstance($course_obj_id);
		/**
		 * @var ilLPCollection $c
		 */
		$c = $lp->getCollectionInstance();

		if (method_exists($c, "getPossibleItems")) { // Abstraction?!
			$this->obj_ids = array_map(function (int $ref_id): int {
				return intval(ilObject::_lookupObjectId($ref_id));
			}, array_filter($c->getPossibleItems($course_ref_id), function (int $ref_id) use ($c): bool {
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
