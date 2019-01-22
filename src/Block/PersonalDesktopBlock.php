<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

/**
 * Class PersonalDesktopBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class PersonalDesktopBlock extends BaseBlock {

	/**
	 * @inheritdoc
	 */
	protected function initRefIds()/*: void*/ {
		$this->ref_ids = self::ilias()->courses()->getCoursesOfUser(self::dic()->user());;
	}
}
