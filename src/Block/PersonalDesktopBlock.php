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
	protected function enabled(): bool {
		return true;
	}


	/**
	 * @inheritdoc
	 */
	protected function initObjIds()/*: void*/ {
		$this->obj_ids = self::ilias()->courses()->getCoursesOfUser(self::dic()->user());
	}


	/**
	 * @inheritdoc
	 */
	protected function initTitle()/*: void*/ {
		$this->setTitle(self::plugin()->translate("learning_progress_of_my_courses", self::LANG_MODULE_BLOCK));
	}
}
