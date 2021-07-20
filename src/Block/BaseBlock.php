<?php

namespace srag\Plugins\SrLearningProgressPDBlock\Block;

use ilBlockGUI;
use ilSrLearningProgressPDBlockPlugin;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\LearningProgressPieUI\SrLearningProgressPDBlock\LearningProgressPieUITrait;
use srag\Plugins\SrLearningProgressPDBlock\Utils\SrLearningProgressPDBlockTrait;

/**
 * Class BaseBlock
 *
 * @package srag\Plugins\SrLearningProgressPDBlock\Block
 */
abstract class BaseBlock extends ilBlockGUI
{

    use DICTrait;
    use SrLearningProgressPDBlockTrait;
    use LearningProgressPieUITrait;

    const LANG_MODULE = "block";
    const PLUGIN_CLASS_NAME = ilSrLearningProgressPDBlockPlugin::class;
    /**
     * @var int[]
     */
    protected $obj_ids = [];


    /**
     * BaseBlock constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function fillDataSection() : void
    {
        $this->setDataSection($this->getPie());
    }


    /**
     * @return string
     */
    public function getBlockType() : string
    {
        return ilSrLearningProgressPDBlockPlugin::PLUGIN_ID;
    }


    /**
     * @inheritDoc
     */
    public function getHTML() : string
    {
        if ($this->enabled()) {
            $this->initBlock();

            return parent::getHTML();
        } else {
            return "";
        }
    }


    /**
     * @return bool
     */
    protected abstract function enabled() : bool;


    /**
     * @inheritDoc
     */
    protected function getLegacyContent() : string
    {
        return $this->getPie();
    }


    /**
     * @return string
     */
    protected function getPie() : string
    {
        $obj_ids = array_filter($this->obj_ids, function (int $obj_id) : bool {
            return self::srLearningProgressPDBlock()->access()->hasReadAccess($obj_id);
        });

        $pie = self::output()->getHTML(self::learningProgressPieUI()->objIds()->withObjIds($obj_ids)->withUsrId(self::dic()->user()
            ->getId())->withShowLegend(true));

        if (!empty($pie)) {
            return $pie;
        } else {
            return self::plugin()->translate("none", self::LANG_MODULE);
        }
    }


    /**
     *
     */
    protected function initBlock() : void
    {
        $this->initTitle();

        $this->initObjIds();

        $this->new_rendering = true;
    }


    /**
     *
     */
    protected abstract function initObjIds() : void;


    /**
     *
     */
    protected abstract function initTitle() : void;


    /**
     * @return bool
     */
    protected function isRepositoryObject() : bool
    {
        return false;
    }
}
