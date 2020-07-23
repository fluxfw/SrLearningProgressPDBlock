<?php

namespace srag\PieChart\SrLearningProgressPDBlock\Component;

/**
 * Interface Factory
 *
 * @package srag\PieChart\SrLearningProgressPDBlock\Component
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
interface Factory
{

    /**
     * ---
     * description:
     *   purpose: Pie Charts are used to display data values in an appealing and easy-to-understand way to the user.
     *   composition:
     *     Pie Charts are composed of one big circle which is divided into various sections, each section represents a title with a value
     *     in a specific color.
     *     There is also a legend on the right hand side of the circle showing which color corresponds to which title.
     *   effect: Pie Charts convey information, they are not interactive.
     *   rivals:
     *     Rival 1:
     *       Progress Meter - Progress Meters can also be used to compare values in a circular shape. The pie chart allows there to be more values
     *       within a single chart.
     *
     * rules:
     *   usage:
     *     1: Pie Charts MUST contain at least 1 Pie Chart Item (PieChartItem).
     *     2: Pie Charts MUST contain 12 or less Pie Chart Items (PieChartItem).
     *     3: Pie Charts MUST contain Pie Chart Items with titles containing 35 or less characters.
     *     4: Pie Charts Items MUST contain a title.
     *     5: Pie Charts Items MUST contain a float value.
     *     6: Pie Charts Items MUST contain a color for the section.
     *   responsiveness:
     *     7: This element will automatically adjust its size with the outer container. Note that this is a SVG element and works well with scaling.
     *
     * ---
     * @param PieChartItem[] $pieChartItems
     *
     * @return PieChart
     */
    public function pieChart(array $pieChartItems) : PieChart;
}
