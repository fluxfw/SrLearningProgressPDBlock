<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Utils;

use srag\Plugins\SrLearningProgressPDBlock\Access\Ilias;

/**
 * Trait SrLearningProgressPDBlockTrait
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait SrLearningProgressPDBlockTrait {

	/**
	 * @return Ilias
	 */
	protected static function ilias(): Ilias {
		return Ilias::getInstance();
	}
}
