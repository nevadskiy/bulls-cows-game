<?php

namespace Outputs;

use CLI\Console;

class SelectMenu
{
    protected $console;

    protected $options = [];

    protected $title;

    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    public function addTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function addOption(SelectOption $option)
    {
        $this->options[] = $option;

        return $this;
    }

    public function render()
    {
        $result = '> ';

        foreach ($this->options as $option) {
            $result .= $option->getName() . "\n";
        }


    }
}