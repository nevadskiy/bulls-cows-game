<?php

namespace Game;

class AttemptsCollection
{
    protected $stack = [];

    public function add(Combination $combo)
    {
        $this->stack[] = $combo;
    }
}