<?php

/**
 * Class Hex2RGBConverter
 */
class Hex2RGBConverter
{
    private $hexCode;
    private $red;
    private $green;
    private $blue;
    private $alpha;

    /**
     * HexConverter constructor.
     *
     * @param string     $hexCode
     * @param string|int $alpha
     */
    public function __construct($hexCode, $alpha = 1)
    {
        if (false === $this->validateInputs($hexCode, $alpha)) {
            throw new Error("Unexpected error has been occurred!");
        }

        $this->setRedGreenBlue();
    }

    /**
     * @param string     $hexCode
     * @param string|int $alpha
     *
     * @return bool
     */
    private function validateInputs($hexCode, $alpha)
    {
        return $this->validateHexFormat($hexCode) && $this->validateAlphaFormat($alpha);
    }

    /**
     * @param string $hexCode
     *
     * @return string
     */
    private function validateHexFormat($hexCode)
    {
        $hexFormatted = ltrim($hexCode, '#');

        switch (strlen($hexFormatted)) {
            case 3:
                $hexFormatted = implode(
                    array_map(
                        function ($char) {
                            return str_repeat($char, 2);
                        },
                        str_split($hexFormatted)
                    )
                );
            case 6:
                return $this->hexCode = $hexFormatted;
            default:
                throw new Error("non-standard hex code : {$hexCode}");
        }
    }

    /**
     * @param string|int $alpha
     *
     * @return mixed
     */
    private function validateAlphaFormat($alpha)
    {
        if (false === preg_match('/^\d?\.?\d$/', $alpha)) {
            throw new Error("non-standard alpha code : {$alpha}");
        }

        return $this->alpha = ltrim((double)$alpha, 0);
    }

    /**
     * @return void
     */
    private function setRedGreenBlue()
    {
        list($this->red, $this->green, $this->blue)
            = array_map(
                function ($charGroup) {
                    return hexdec($charGroup);
                },
                str_split($this->hexCode, 2)
            );
    }

    /**
     * @return string
     */
    public function toRGB()
    {
        return sprintf('rgb(%d, %d, %d)', $this->red, $this->green, $this->blue);
    }

    /**
     * @return string
     */
    public function toRGBA()
    {
        return sprintf('rgba(%d, %d, %d, %s)', $this->red, $this->green, $this->blue, $this->alpha);
    }
}
