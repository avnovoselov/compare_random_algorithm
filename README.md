# Compare random generated noise

### Install

```bash
git clone https://github.com/avnovoselov/compare_random_algorithm.git
cd compare_random_algorithm
composer install
```

### Start server
```bash
php -S 127.0.0.1:8080 -t public
```
open [link](http://127.0.0.1:8080) in your browser 

### Add custom algorithm

You need implements `AlgorithmInterface` and put your class into `src/Algorithm/<YourRandomGenerator>.php`.
`AlgorithmInterface` require implement method `sequence`.

### Example custom algorithm
Put `Custom.php` to `src/Algorithm`
```php
<?php
// src/Algorithm/Custom.php

namespace Random\Algorithm;

use Generator;

/**
 * Class Custom
 * @package Random\Algorithm
 */
final class Custom extends AbstractAlgorithm
{

    /**
     * @inheritDoc
     */
    public function sequence(): Generator
    {
        $i = 0;
        $halfMaxX = $this->maxX / 2;
        $halfMaxY = $this->maxY / 2;
        while ($i++ < $this->getSequenceLength()) {
            yield [
                $halfMaxX + rand(-$halfMaxX, $halfMaxX),
                $halfMaxY + rand(-$halfMaxY, $halfMaxY),
            ];
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
```

Add rule for custom algorithm to  `src/AlgorithmStaticFactory.php`

```php
...
    final public static function factory(string $algorithmName, int $maxX, int $maxY): AlgorithmInterface
    {
        switch ($algorithmName) {
            ...
            case "custom":
                return new Custom($maxX, $maxY);
            ...
        }
    }
...
```

Now you can get a noised image by url
[http://127.0.0.1:8080/application.php?algorithm=custom](http://127.0.0.1:8080/application.php?algorithm=custom)