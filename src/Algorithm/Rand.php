<?php


namespace Random\Algorithm;


use Generator;

/**
 * Class Rand
 *
 * use rand($min, $max) function to sequence generation
 *
 * @package Random\Algorithm
 */
final class Rand extends AbstractAlgorithm
{

    /**
     * @inheritDoc
     */
    public function sequence(): Generator
    {
        $i = 0;
        while ($i++ < $this->getSequenceLength()) {
            yield [rand(0, $this->maxX), rand(0, $this->maxY)];
        }
    }

    /**
     * @inheritDoc
     */
    public function __construct(int $maxX, int $maxY)
    {
        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }
}