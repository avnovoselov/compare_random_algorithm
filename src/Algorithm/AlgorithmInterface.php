<?php


namespace Random\Algorithm;


use Generator;

/**
 * Interface AlgorithmInterface
 * @package Random\Algorithm
 */
interface AlgorithmInterface
{
    /**
     * Return coordinates array on each iteration
     * @return Generator
     * @example
     * Algorithm::sequence() // [<int x>, <int y>]
     */
    public function sequence(): Generator;

    /**
     * AlgorithmInterface constructor.
     * @param int $maxX
     * @param int $maxY
     */
    public function __construct(int $maxX, int $maxY);
}