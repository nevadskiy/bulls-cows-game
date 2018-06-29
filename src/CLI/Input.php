<?php

namespace CLI;

class Input
{
    protected $stream;

    public function __construct($stream = STDIN)
    {
        $this->stream = $stream;
    }

    public function read($byChar = false)
    {
        return $byChar ? fgetc($this->stream) : fgets($this->stream);
    }
}