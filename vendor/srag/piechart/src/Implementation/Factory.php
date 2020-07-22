<?php

namespace srag\PieChart\SrLearningProgressPDBlock\Implementation;

use srag\PieChart\SrLearningProgressPDBlock\Component\Factory as FactoryInterface;
use srag\PieChart\SrLearningProgressPDBlock\Component\PieChart as PieChartInterface;

/**
 * Class Factory
 *
 * @package srag\PieChart\SrLearningProgressPDBlock\Implementation
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class Factory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    public function pieChart(array $pieChartItems) : PieChartInterface
    {
        return new PieChart($pieChartItems);
    }
}
