<?php

use srag\ActiveRecordConfig\SrLearningProgressPDBlock\Exception\ActiveRecordConfigException;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\DIC\SrLearningProgressPDBlock\Exception\DICException;
use srag\Plugins\SrLearningProgressPDBlock\Block\CourseBlock53;
use srag\Plugins\SrLearningProgressPDBlock\Block\CourseBlock54;
use srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktopBlock53;
use srag\Plugins\SrLearningProgressPDBlock\Block\PersonalDesktopBlock54;
use srag\Plugins\SrLearningProgressPDBlock\Config\Config;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ilSrLearningProgressPDBlockUIHookGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrLearningProgressPDBlockUIHookGUI extends ilUIHookPluginGUI {

	use DICTrait;
	use SrLearningProgressPDBlockTrait;
	const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
	const PERSONAL_DESKTOP_INIT = "personal_desktop";
	const COURSES_INIT = "courses";
	const COMPONENT_PERSONAL_DESKTOP = "Services/PersonalDesktop";
	const COMPONENT_CONTAINER = "Services/Container";
	const PART_CENTER_RIGHT = "right_column";
	const LANG_MODULE_SEARCH = "search";
	/**
	 * @var bool[]
	 */
	protected static $load = [
		self::PERSONAL_DESKTOP_INIT => false,
		self::COURSES_INIT => false
	];


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 *
	 * @return array
	 * @throws ActiveRecordConfigException
	 * @throws DICException
	 * @throws ilTemplateException
	 */
	public function getHTML(/*string*/
		$a_comp, /*string*/
		$a_part, $a_par = []): array {

		if (!self::$load[self::PERSONAL_DESKTOP_INIT]) {

			if (Config::getField(Config::KEY_SHOW_ON_PERSONAL_DESKTOP)) {

				if ($a_comp === self::COMPONENT_PERSONAL_DESKTOP && $a_part === self::PART_CENTER_RIGHT) {

					self::$load[self::PERSONAL_DESKTOP_INIT] = true;

					return [
						"mode" => self::PREPEND,
						"html" => self::output()->getHTML(self::version()->is54() ? new PersonalDesktopBlock54() : new PersonalDesktopBlock53())
					];
				}
			}
		}

		if (!self::$load[self::COURSES_INIT]) {

			if (Config::getField(Config::KEY_SHOW_ON_COURSES)) {

				if (self::dic()->ctrl()->getCmdClass() === strtolower(ilObjCourseGUI::class) && $a_comp === self::COMPONENT_CONTAINER
					&& $a_part === self::PART_CENTER_RIGHT) {

					self::$load[self::COURSES_INIT] = true;

					return [
						"mode" => self::PREPEND,
						"html" => self::output()->getHTML(self::version()->is54() ? new CourseBlock54() : new CourseBlock53())
					];
				}
			}
		}

		return parent::getHTML($a_comp, $a_part, $a_par);
	}
}
