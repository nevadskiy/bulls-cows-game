<?php

namespace CLI;

class Output
{
    protected $stream;

    public function __construct($stream = STDOUT)
    {
        $this->stream = $stream;
    }

    public function write(string $buffer): void
    {
        fwrite($this->stream, $buffer);
    }
}