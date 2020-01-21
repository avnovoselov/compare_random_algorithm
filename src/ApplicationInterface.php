<?php


namespace Random;


use Dotenv\Dotenv;

/**
 * Interface ApplicationInterface
 * @package Random
 */
interface ApplicationInterface
{
    /**
     * Environment storage getter
     *
     * @return Dotenv
     */
    public function getEnvironment(): Dotenv;
}