<?php

namespace Controls;

use CLI\Console;

class KeyListener
{
    protected $shouldContinue = true;

    protected $console;

    protected $controls = [];

    public function __construct(Console $console)
    {
        $this->console = $console;

        $console->config()->enableRealtime();
        $console->config()->disableEcho();
    }

    public function add($ascii, callable $listener)
    {
        $this->controls[$ascii] = $listener;

        return $this;
    }

    public function run(callable $default = null)
    {
        while ($this->shouldContinue) {
            $char = $this->console->read();
            $ascii = \ord($char);

            if (isset($this->controls[$ascii])) {
                $this->shouldContinue = $this->controls[$ascii]();
            } else if ($default) {
                $default($char);
            }
        }
    }
}

