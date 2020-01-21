<?php


namespace Random\Application;


use Dotenv\Dotenv;
use Exception;

/**
 * Class Environment
 * @package Random\Application
 */
final class Environment
{
    /**
     * String constants contains variables names in .env file
     */
    const WIDTH                   = "WIDTH";
    const HEIGHT                  = "HEIGHT";
    const PADDING                 = "PADDING";
    const IMAGE_NOISE_PIXEL_COLOR = "IMAGE_NOISE_PIXEL_COLOR";
    const IMAGE_BACKGROUND_COLOR  = "IMAGE_BACKGROUND_COLOR";
    const IMAGE_TEXT_COLOR        = "IMAGE_TEXT_COLOR";

    const REGEX_HEX_COLOR = "/^#[a-fA-F0-9]{6}$/";

    /**
     * Required integer variables in .env file
     */
    private const REQUIRED_ENVIRONMENT_INTEGER = [self::WIDTH, self::HEIGHT, self::PADDING];

    /**
     * Required string color variables in .env file
     */
    private const REQUIRED_ENVIRONMENT_COLOR = [self::IMAGE_NOISE_PIXEL_COLOR, self::IMAGE_BACKGROUND_COLOR, self::IMAGE_TEXT_COLOR];

    /**
     * Key-value pair storage to keep .env file variables
     *
     * @var array
     */
    private $storage;

    /**
     * DotEnv instance
     *
     * @var Dotenv
     */
    private $dotEnv;

    /**
     * Setup required environment fields
     *
     * @return $this
     */
    private function validate()
    {
        try {
            $this->dotEnv->required(static::REQUIRED_ENVIRONMENT_INTEGER)->isInteger();
            $this->dotEnv->required(static::REQUIRED_ENVIRONMENT_COLOR)->allowedRegexValues(static::REGEX_HEX_COLOR);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $this;
    }

    /**
     * Return stored variable value
     *
     * @param string $field
     * @return mixed|null
     */
    public function get(string $field)
    {
        return $this->storage[$field] ?? null;
    }

    /**
     * Environment constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->dotEnv = Dotenv::createImmutable($path);
        $this->storage = $this->dotEnv->load();

        $this->validate();
    }
}