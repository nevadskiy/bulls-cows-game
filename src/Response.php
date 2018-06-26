<?php

class Response
{
    protected $bulls;

    protected $cows;

    public function __construct(int $bulls = 0, int $cows = 0)
    {
        $this->bulls = $bulls;
        $this->cows = $cows;
    }

    public function getBulls(): int
    {
        return $this->bulls;
    }

    public function getCows(): int
    {
        return $this->cows;
    }

    public function incrementBulls()
    {
        if ($this->bulls < 4) {
            $this->bulls++;
        }
    }

    public function incrementCows()
    {
        if ($this->cows < 4) {
            $this->cows++;
        }
    }
}