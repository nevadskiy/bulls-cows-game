<?php

namespace Game;

class ComboGenerator
{
    protected $comboString = '';

    public static function generate(): Combination
    {
        $generator = new self();

        while (strlen($generator->comboString) < 4) {
            $digit = $generator->getRandomDigit();

            if ($generator->hasSameDigit($digit)) {
                continue;
            }

             $generator->comboString .= $digit;
        }

        return new Combination($generator->comboString);
    }

    private function __construct() {}

    protected function hasSameDigit(string $digit): bool
    {
        return strpos($this->comboString, $digit) !== false;
    }

    protected function getRandomDigit(): string
    {
        return (string) rand(0, 9);
    }
}