<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilObject;

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
		$this->obj_ids = [ intval(ilObject::_lookupObjectId(filter_input(INPUT_GET, "ref_id"))) ];
	}


	/**
	 * @inheritdoc
	 */
	protected function initTitle()/*: void*/ {

	}
}
