<?php

namespace srag\LearningProgressPieUI\SrLearningProgressPDBlock;

use ILIAS\Data\Color;
use ilLearningProgressBaseGUI;
use ilLPStatus;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;
use srag\PieChart\SrLearningProgressPDBlock\Component\PieChartItem as PieChartItemInterface;
use srag\PieChart\SrLearningProgressPDBlock\Implementation\Factory;
use srag\PieChart\SrLearningProgressPDBlock\Implementation\PieChartItem;

/**
 * Class AbstractLearningProgressPieUI
 *
 * @package srag\LearningProgressPieUI\SrLearningProgressPDBlock
 */
abstract class AbstractLearningProgressPieUI
{

    use DICTrait;

    const LP_STATUS
        = [
            ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM,
            ilLPStatus::LP_STATUS_IN_PROGRESS_NUM,
            ilLPStatus::LP_STATUS_COMPLETED_NUM
            //ilLPStatus::LP_STATUS_FAILED_NUM
        ];
    const LP_STATUS_COLOR
        = [
            ilLPStatus::LP_STATUS_NOT_ATTEMPTED_NUM => [221, 221, 221],
            ilLPStatus::LP_STATUS_IN_PROGRESS_NUM   => [246, 216, 66],
            ilLPStatus::LP_STATUS_COMPLETED_NUM     => [189, 207, 50],
            ilLPStatus::LP_STATUS_FAILED            => [176, 96, 96]
        ];
    /**
     * @var bool
     */
    protected static $init = false;
    /**
     * @var array|null
     */
    protected $cache = null;
    /**
     * @var bool
     */
    protected $show_empty = false;
    /**
     * @var bool
     */
    protected $show_legend = true;


    /**
     * AbstractLearningProgressPieUI constructor
     */
    public function __construct()
    {

    }


    /**
     * @return array
     */
    public function getData() : array
    {
        if ($this->cache === null) {

            $data = $this->parseData();

            $data = array_map(function (int $status) use ($data) : array {
                return [
                    "color" => self::LP_STATUS_COLOR[$status],
                    "title" => $this->getText($status),
                    "value" => ($data[$status] ?: 0)
                ];
            }, self::LP_STATUS);

            if (!$this->show_empty) {
                $data = array_filter($data, function (array $data) : bool {
                    return ($data["value"] > 0);
                });
            }

            $this->cache = [
                "data"  => $data,
                "count" => $this->getCount()
            ];
        }

        return $this->cache;
    }


    /**
     * @return array
     */
    public function getTitles() : array
    {
        return array_map(function (int $status) : string {
            return $this->getText($status);
        }, self::LP_STATUS);
    }


    /**
     * @return string
     */
    public function render() : string
    {
        $data = $this->getData();
        $count = $data["count"];
        $data = $data["data"];

        if (count($data) > 0) {

            $data = array_values($data);

            $data = array_map(function (array $data) : PieChartItemInterface {
                return new PieChartItem($data["title"], $data["value"], new Color($data["color"][0], $data["color"][1], $data["color"][2]));
            }, $data);

            return self::output()->getHTML((new Factory())->pieChart($data)->withShowLegend($this->show_legend)
                ->withCustomTotalValue(floatval($count)));
        }

        return "";
    }


    /**
     * @param bool $show_empty
     *
     * @return self
     */
    public function withShowEmpty(bool $show_empty) : self
    {
        $this->show_empty = $show_empty;

        return $this;
    }


    /**
     * @param bool show_legend
     *
     * @return self
     */
    public function withShowLegend(bool $show_legend) : self
    {
        $this->show_legend = $show_legend;

        return $this;
    }


    /**
     * @return int
     */
    protected abstract function getCount() : int;


    /**
     * @return int[]
     */
    protected abstract function parseData() : array;


    /**
     * @param int $status
     *
     * @return string
     */
    private function getText(int $status) : string
    {
        self::dic()->language()->loadLanguageModule("trac");

        return ilLearningProgressBaseGUI::_getStatusText($status);
    }
}
