<?php


namespace Random\Algorithm;


use Exception;
use Generator;

/**
 * Class Rand
 *
 * use random_int($min, $max) function to sequence generation
 *
 * @package Random\Algorithm
 */
class RandomInt extends AbstractAlgorithm
{
    /**
     * Return coordinates array on each iteration
     * @return Generator
     * @throws Exception
     * @example
     * Algorithm::sequence() // [<int x>, <int y>]
     */
    public function sequence(): Generator
    {
        $i = 0;
        while ($i++ < $this->getSequenceLength()) {
            yield [random_int(0, $this->maxX), random_int(0, $this->maxY)];
        }
    }

    /**
     * RandomInt constructor.
     * @param int $maxX
     * @param int $maxY
     */
    public function __construct(int $maxX, int $maxY)
    {
        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }
}