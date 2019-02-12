<?php

namespace srag\CustomInputGUIs\SrLearningProgressPDBlock;

use ILIAS\UI\Implementation\Component\Chart\ProgressMeter\Factory as ProgressMeterFactoryCore;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\LearningProgressPie\LearningProgressPie;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\ProgressMeter\Implementation\Factory as ProgressMeterFactory;
use srag\CustomInputGUIs\SrLearningProgressPDBlock\ViewControlModeGUI\ViewControlModeGUI;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;

/**
 * Class CustomInputGUIs
 *
 * @package srag\CustomInputGUIs\SrLearningProgressPDBlock
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @internal
 */
final class CustomInputGUIs {

	use DICTrait;
	/**
	 * @var self
	 */
	protected static $instance = NULL;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * @return LearningProgressPie
	 */
	public function LearningProgressPie() {
		return new LearningProgressPie();
	}


	/**
	 * @return ProgressMeterFactoryCore|ProgressMeterFactory
	 *
	 * @since ILIAS 5.4
	 */
	public function progressMeter() {
		if (self::version()->is54()) {
			return new ProgressMeterFactoryCore();
		} else {
			return new ProgressMeterFactory();
		}
	}


	/**
	 * @return ViewControlModeGUI
	 */
	public function viewControlModeGUI() {
		return new ViewControlModeGUI();
	}
}
