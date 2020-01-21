<?php


namespace Random;


use Exception;
use Random\Algorithm\AlgorithmInterface;
use Random\Algorithm\Rand;
use Random\Algorithm\RandomInt;

/**
 * Class AlgorithmStaticFactory
 * @package Random
 */
final class AlgorithmStaticFactory
{
    /**
     * @param string $algorithmName
     * @param int $maxX
     * @param int $maxY
     * @return AlgorithmInterface
     * @throws Exception
     */
    final public static function factory(string $algorithmName, int $maxX, int $maxY): AlgorithmInterface
    {
        switch ($algorithmName) {
            case "rand":
                return new Rand($maxX, $maxY);
            case "random_int":
                return new RandomInt($maxX, $maxY);
            default:
                throw new Exception("Algorithm {$algorithmName} not found");
        }
    }
}