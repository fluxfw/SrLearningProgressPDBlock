<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Config;

require_once __DIR__ . "/../../vendor/autoload.php";

use ilSrLearningProgressPDBlockPlugin;
use ilUtil;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class ConfigCtrl
 *
 * @package           srag\Plugins\SrLearningProgressPDBlock\Config
 *
 * @ilCtrl_isCalledBy srag\Plugins\SrLearningProgressPDBlock\Config\ConfigCtrl: ilSrLearningProgressPDBlockConfigGUI
 */
class ConfigCtrl
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;

    const CMD_CONFIGURE = "configure";
    const CMD_UPDATE_CONFIGURE = "updateConfigure";
    const LANG_MODULE = "config";
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    const TAB_CONFIGURATION = "configuration";


    /**
     * ConfigCtrl constructor
     */
    public function __construct()
    {

    }


    /**
     *
     */
    public static function addTabs() : void
    {
        self::dic()->tabs()->addTab(self::TAB_CONFIGURATION, self::plugin()->translate("configuration", self::LANG_MODULE), self::dic()->ctrl()
            ->getLinkTargetByClass(self::class, self::CMD_CONFIGURE));
    }


    /**
     *
     */
    public function executeCommand() : void
    {
        $this->setTabs();

        $next_class = self::dic()->ctrl()->getNextClass($this);

        switch (strtolower($next_class)) {
            default:
                $cmd = self::dic()->ctrl()->getCmd();

                switch ($cmd) {
                    case self::CMD_CONFIGURE:
                    case self::CMD_UPDATE_CONFIGURE:
                        $this->{$cmd}();
                        break;

                    default:
                        break;
                }
                break;
        }
    }


    /**
     *
     */
    protected function configure() : void
    {
        self::dic()->tabs()->activateTab(self::TAB_CONFIGURATION);

        $form = self::srLearningProgressPDBlock()->config()->factory()->newFormBuilderInstance($this);

        self::output()->output($form);
    }


    /**
     *
     */
    protected function setTabs() : void
    {

    }


    /**
     *
     */
    protected function updateConfigure() : void
    {
        self::dic()->tabs()->activateTab(self::TAB_CONFIGURATION);

        $form = self::srLearningProgressPDBlock()->config()->factory()->newFormBuilderInstance($this);

        if (!$form->storeForm()) {
            self::output()->output($form);

            return;
        }

        ilUtil::sendSuccess(self::plugin()->translate("configuration_saved", self::LANG_MODULE), true);

        self::dic()->ctrl()->redirect($this, self::CMD_CONFIGURE);
    }
}
