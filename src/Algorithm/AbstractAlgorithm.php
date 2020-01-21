<?php


namespace Random\Algorithm;


abstract class AbstractAlgorithm implements AlgorithmInterface
{
    /**
     * @var int
     */
    protected $maxX;

    /**
     * @var int
     */
    protected $maxY;

    /**
     * Return half of rectangle canvas area
     * Sequence must fill half of canvas area
     *
     * @return float|int
     */
    protected function getSequenceLength()
    {
        return $this->maxX * $this->maxY / 2;
    }
}