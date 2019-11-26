<?php

namespace srag\DIC\SrLearningProgressPDBlock\DIC;

use srag\DIC\SrLearningProgressPDBlock\Database\DatabaseDetector;
use srag\DIC\SrLearningProgressPDBlock\Database\DatabaseInterface;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC\SrLearningProgressPDBlock\DIC
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class AbstractDIC implements DICInterface {

	/**
	 * AbstractDIC constructor
	 */
	protected function __construct() {

	}


	/**
	 * @inheritdoc
	 */
	public function database(): DatabaseInterface {
		return DatabaseDetector::getInstance($this->databaseCore());
	}
}
