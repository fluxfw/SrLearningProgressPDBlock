<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

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
	protected function initRefIds()/*: void*/ {
		$this->ref_ids = [ intval(filter_input(INPUT_GET, "ref_id")) ];
	}
}
