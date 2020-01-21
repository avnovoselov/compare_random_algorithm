<?php

namespace Random;

/**
 * Class Image
 */
class Image
{
    /**
     * Index of array element contains red channel value
     * @see Image::hexToRGB()
     */
    private const RED = 0;

    /**
     * Index of array element contains green channel value
     * @see Image::hexToRGB()
     */
    private const GREEN = 1;

    /**
     * Index of array element contains blue channel value
     * @see Image::hexToRGB()
     */
    private const BLUE = 2;

    /**
     * @var int
     */
    private $wight;

    /**
     * @var int
     */
    private $height;

    /**
     * GD image resource
     *
     * @var resource
     */
    private $resource;

    /**
     * Drawn pixel color
     *
     * @var int
     */
    private $color;

    /**
     * Convert $hexColor string to array of integers contains RGB channel values
     *
     * @param string $hexColor
     * @return mixed
     * @example
     *  static::hexToRGB("#FF0000"); // returns [0 => 255, 1 => 0, 2 => 0] - red color
     */
    private static function hexToRGB(string $hexColor)
    {
        return sscanf($hexColor, "#%02x%02x%02x");
    }

    /**
     * Draw point on canvas
     *
     * @param int $x
     * @param int $y
     * @return Image
     */
    public function drawPoint(int $x, int $y)
    {
        imagesetpixel($this->resource, $x, $y, $this->color);

        return $this;
    }

    /**
     * @return $this
     */
    public function asPNG()
    {
        imagepng($this->resource);
        return $this;
    }

    /**
     * Image constructor.
     * @param int $wight - image width
     * @param int $height - image height
     * @param string $backgroundHex - image background color (ex.: "#FF0000" - to red background)
     * @param string $colorHex - drawn pixel color
     */
    public function __construct(int $wight, int $height, string $backgroundHex, string $colorHex)
    {
        $this->wight = $wight;
        $this->height = $height;

        $this->resource = imagecreate($wight, $height);

        $background = static::hexToRGB($backgroundHex);
        imagecolorallocate(
            $this->resource,
            $background[static::RED],
            $background[static::GREEN],
            $background[static::BLUE]
        );

        $color = static::hexToRGB($colorHex);
        $this->color = imagecolorallocate(
            $this->resource,
            $color[static::RED],
            $color[static::GREEN],
            $color[static::BLUE]
        );
    }
}