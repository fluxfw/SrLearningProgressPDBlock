<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Access;

use ilLPObjSettings;
use ilLPStatus;
use ilObjectLP;
use ilObjUser;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class LearningProgress
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Access
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class LearningProgress {

	use SrLearningProgressPDBlockTrait;
	use DICTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
	const LP_STATUS_COLOR = [
		ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM => "#DDDDDD",
		ilLPStatus::LP_STATUS_IN_PROGRESS_NUM => "#F6D842",
		ilLPStatus::LP_STATUS_COMPLETED_NUM => "#60B060",
		ilLPStatus::LP_STATUS_FAILED => "#B06060"
	];
	/**
	 * @var self[]
	 */
	protected static $instances = [];


	/**
	 * @param ilObjUser $user
	 *
	 * @return self
	 */
	public static function getInstance(ilObjUser $user): self {
		if (!isset(self::$instances[$user->getId()])) {
			self::$instances[$user->getId()] = new self($user);
		}

		return self::$instances[$user->getId()];
	}


	/**
	 * @var ilObjUser
	 */
	protected $user;


	/**
	 * LearningProgress constructor
	 *
	 * @param ilObjUser $user
	 */
	private function __construct(ilObjUser $user) {
		$this->user = $user;
	}


	/**
	 * @param int $obj_id
	 *
	 * @return int
	 */
	public function getStatus(int $obj_id): int {
		// Avoid exit
		if (ilObjectLP::getInstance($obj_id)->getCurrentMode() != ilLPObjSettings::LP_MODE_UNDEFINED) {
			$status = intval(ilLPStatus::_lookupStatus($obj_id, $this->user->getId()));
		} else {
			$status = ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM;
		}

		return $status;
	}
}
