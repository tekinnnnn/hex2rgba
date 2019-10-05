<?php

require_once __DIR__ . '/Hex2RGBConverter.php';

/**
 * #FFF 0.3 (string) rgba(255, 255, 255, .3)
 * #FFFFFF 1 (integer) rgba(255, 255, 255, 1)
 * FFF .5 (string) rgba(255, 255, 255, .5)
 * FFFFFF 1 (integer) rgba(255, 255, 255, 1)
 * FFFFF 1 (integer) throws Error
 */

$converter = new Hex2RGBConverter('#FFF', '0.3');
echo "Input : '#FFF', '0.3'" . PHP_EOL;
echo $converter->toRGB() . PHP_EOL;
echo $converter->toRGBA() . PHP_EOL;

$converter = new Hex2RGBConverter('#FFFFFF', 1);
echo "Input : '#FFFFFF', 1" . PHP_EOL;
echo $converter->toRGB() . PHP_EOL;
echo $converter->toRGBA() . PHP_EOL;

$converter = new Hex2RGBConverter('FFF', '0.5');
echo "Input : 'FFF', '0.5'" . PHP_EOL;
echo $converter->toRGB() . PHP_EOL;
echo $converter->toRGBA() . PHP_EOL;

$converter = new Hex2RGBConverter('FFFFFF', 1);
echo "Input : 'FFFFFF', 1" . PHP_EOL;
echo $converter->toRGB() . PHP_EOL;
echo $converter->toRGBA() . PHP_EOL;

$converter = new Hex2RGBConverter('FFFFF', 1);
echo "Input : 'FFFFF', 1" . PHP_EOL;
echo $converter->toRGB() . PHP_EOL;
echo $converter->toRGBA() . PHP_EOL;
