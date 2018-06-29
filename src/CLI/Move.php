<?php

namespace CLI;

class Move
{
    protected $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function toTop()
    {
        $this->output->write("\033[H");
    }

    public function toLine(int $line)
    {
        $this->output->write(sprintf("\033[%d;0H", $line));
    }
}