<?php

namespace srag\LearningProgressPieUI\SrLearningProgressPDBlock;

/**
 * Class CountLearningProgressPieUI
 *
 * @package srag\LearningProgressPieUI\SrLearningProgressPDBlock
 */
class CountLearningProgressPieUI extends AbstractLearningProgressPieUI
{

    /**
     * @var int[]
     */
    protected $count = [];


    /**
     * @param int[] $count
     *
     * @return self
     */
    public function withCount(array $count) : self
    {
        $this->count = $count;

        return $this;
    }


    /**
     * @inheritDoc
     */
    protected function getCount() : int
    {
        return array_reduce($this->count, function (int $sum, int $count) : int {
            return ($sum + $count);
        }, 0);
    }


    /**
     * @inheritDoc
     */
    protected function parseData() : array
    {
        if (count($this->count) > 0) {
            return $this->count;
        } else {
            return [];
        }
    }
}
