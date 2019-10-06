# hex2rgba
This repo includes the class that converts hexadecimal codes to R(ed) G(reen) B(lue) A(lpha) color codes.


```php
<?php

require_once __DIR__ . '/Hex2RGBConverter.php';

$converter = new Hex2RGBConverter('#FFF', '0.3');
echo $converter->toRGB() . PHP_EOL; # rgb(255, 255, 255)
echo $converter->toRGBA() . PHP_EOL; # rgba(255, 255, 255, .3)

$converter = new Hex2RGBConverter('#FFFFFF', 1);
echo $converter->toRGB() . PHP_EOL; # rgb(255, 255, 255)
echo $converter->toRGBA() . PHP_EOL; # rgba(255, 255, 255, 1)

$converter = new Hex2RGBConverter('FFF', '0.5');
echo $converter->toRGB() . PHP_EOL; # rgb(255, 255, 255)
echo $converter->toRGBA() . PHP_EOL; # rgba(255, 255, 255, .5)

$converter = new Hex2RGBConverter('FFFFFF', 1);
echo $converter->toRGB() . PHP_EOL; # rgb(255, 255, 255)
echo $converter->toRGBA() . PHP_EOL; # rgba(255, 255, 255, 1)

$converter = new Hex2RGBConverter('FFFFF', 1);
echo $converter->toRGB() . PHP_EOL; # throws Exception
echo $converter->toRGBA() . PHP_EOL; # throws Exception
```