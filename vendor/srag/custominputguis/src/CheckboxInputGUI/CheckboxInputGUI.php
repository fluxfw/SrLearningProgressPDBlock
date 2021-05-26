<?php

namespace srag\CustomInputGUIs\SrLearningProgressPDBlock\CheckboxInputGUI;

use ilCheckboxInputGUI;
use ilTableFilterItem;
use srag\DIC\SrLearningProgressPDBlock\DICTrait;

/**
 * Class CheckboxInputGUI
 *
 * @package srag\CustomInputGUIs\SrLearningProgressPDBlock\CheckboxInputGUI
 */
class CheckboxInputGUI extends ilCheckboxInputGUI implements ilTableFilterItem
{

    use DICTrait;
}
