<?php

use ILIAS\Data\Color;
use srag\PieChart\SrLearningProgressPDBlock\Implementation\Factory;
use srag\PieChart\SrLearningProgressPDBlock\Implementation\PieChartItem;

/**
 * @return string
 */
function text_color() : string
{
    global $DIC;

    $c = (new Factory())/*$DIC->ui()->factory()->chart()*/ ->pieChart([
        new PieChartItem("One", 3, new Color(220, 220, 220)),
        new PieChartItem("Two", 7.2, new Color(0, 0, 0), new Color(255, 255, 255)),
        new PieChartItem("Three", 4, new Color(100, 100, 100), new Color(255, 255, 0))
    ]);

    return $DIC->ui()->renderer()->render($c);
}
