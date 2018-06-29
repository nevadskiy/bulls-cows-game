<?php

namespace Outputs\Select;

use CLI\Console;
use Controls\Controls;
use Controls\KeyListener;

class Menu
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

    public function addOption(Option $option)
    {
        $this->options[] = $option;

        return $this;
    }

    public function show()
    {
        $this->console->config()->enableRealtime();
        $this->console->config()->disableEcho();
        $this->console->config()->disableCursor();

        $this->activateIndex(0);

        $this->render();
        $this->addListeners();
    }

    protected function render()
    {
        $this->console->clear();

        $output = '';

        foreach ($this->options as $option) {
            $output .= $option->render() . "\n";
        }

        $this->console->write($output);
    }

    protected function activeUp()
    {
        $this->activeType('up');

    }

    protected function activeDown()
    {
        $this->activeType('down');
    }

    public function activeType(string $type)
    {
        for ($i = 0, $count = \count($this->options); $i < $count; $i++) {

            $option = $this->options[$i];

            if (!$option->isActive()) {
                continue;
            }

            switch ($type) {
                case 'up': {
                    // Prev item
                    $needleIndex = ($i + $count - 1) % $count;
                    break;
                }
                case 'down': {
                    // Next item
                    $needleIndex = ($i + 1) % $count;
                    break;
                }
            }

            $this->options[$needleIndex]->activate();
            $option->deactivate();
            break;
        }
    }

    protected function activateIndex(int $index)
    {
        $this->options[$index]->activate();
    }

    public function addListeners()
    {
        (new KeyListener($this->console))
            ->add(Controls::$keymaps['UP'], function() {

                $this->activeUp();
                $this->render();

                return true;
            })
            ->add(Controls::$keymaps['DOWN'], function() {

                $this->activeDown();
                $this->render();

                return true;
            })
            // Add enter key button
            ->run();
    }
}