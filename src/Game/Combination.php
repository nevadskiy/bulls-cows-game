<?php

namespace Game;

/**
 * Class Combination
 */
class Combination
{
    /**
     * @var string
     */
    protected $combo;

    /**
     * Combination constructor.
     * @param string $combo
     */
    public function __construct(string $combo)
    {
        if ($this->hasWrongFormat($combo)) {
            throw new \InvalidArgumentException('Wrong combo '.$combo.' has been specified');
        }

        $this->combo = $combo;
    }

    /**
     * @param int|null $index
     * @return string
     */
    public function get(int $index = null): string
    {
        if ($index !== null && isset($this->combo[$index])) {
            return $this->combo[$index];
        }

        return $this->combo;
    }

    /**
     * @param string $combo
     * @return bool
     */
    protected function hasWrongFormat(string $combo): bool
    {
        return !$this->hasOnlyDigits($combo)
            || $this->hasRepeatedChars($combo)
            || $this->hasWrongLength($combo);
    }

    /**
     * @param string $combo
     * @return bool
     */
    protected function hasOnlyDigits(string $combo): bool
    {
        return ctype_digit($combo);
    }

    /**
     * @param string $combo
     * @return bool
     */
    protected function hasRepeatedChars(string $combo): bool
    {
        return preg_match('/([0-9])\1{1,}/', $combo);
    }

    /**
     * @param string $combo
     * @return bool
     */
    protected function hasWrongLength(string $combo): bool
    {
        return strlen($combo) !== 4;
    }
}