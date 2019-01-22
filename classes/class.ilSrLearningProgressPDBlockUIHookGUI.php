<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Config\Config;
use srag\Plugins\SrLearningProgressPDBlock\Search\PersonalDesktopGUI;
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
	const COMPONENT_PERSONAL_DESKTOP = "Services/PersonalDesktop";
	const PART_CENTER_RIGHT = "right_column";
	const LANG_MODULE_SEARCH = "search";
	/**
	 * @var bool[]
	 */
	protected static $load = [
		self::PERSONAL_DESKTOP_INIT => false
	];


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 *
	 * @return array
	 */
	public function getHTML(/*string*/
		$a_comp, /*string*/
		$a_part, $a_par = []): array {

		if (!self::$load[self::PERSONAL_DESKTOP_INIT]) {
			if ($a_comp === self::COMPONENT_PERSONAL_DESKTOP && $a_part === self::PART_CENTER_RIGHT) {

				self::$load[self::PERSONAL_DESKTOP_INIT] = true;

				if (Config::getField(Config::KEY_SHOW_ON_PERSONAL_DESKTOP)) {

					return [
						"mode" => ilUIHookPluginGUI::PREPEND,
						"html" => self::output()->getHTML(new PersonalDesktopGUI())
					];
				}
			}
		}

		return parent::getHTML($a_comp, $a_part, $a_par);
	}
}
