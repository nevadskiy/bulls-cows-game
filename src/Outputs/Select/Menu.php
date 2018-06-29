<?php

namespace Outputs\Select;

use CLI\Console;
use Controls\Controls;
use Controls\KeyListener;

class Menu
{
    protected $console;

    protected $options = [];

    protected $title = '';

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
        $this->prepareConsole();

        $this->activateIndex(0);

        $this->render();
        $this->addListeners();
    }

    protected function render()
    {
        $this->console->clear();

        $output = $this->renderTitle();
        $output .= $this->renderSeparator();

        foreach ($this->options as $option) {
            $output .= $option->render() . "\n";
        }

        $this->console->write($output);
    }

    protected function renderSeparator()
    {
        $length = $this->title ? mb_strlen($this->title) + 4 : 0;

        return ($output = str_repeat('-', $length)) ? $output . "\n": '';
    }

    protected function renderTitle()
    {
        return $this->title . "\n";
    }

    protected function activeUp()
    {
        $this->activeType('up');

    }

    protected function activeDown()
    {
        $this->activeType('down');
    }

    protected function activeType(string $type)
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

    protected function selectActive()
    {
        foreach ($this->options as $option) {
            if (!$option->isActive()) {
                continue;
            }

            $this->console->clear();
            $option->select();
            $this->restoreConsole();
        }
    }

    protected function prepareConsole()
    {
        $this->console->config()->enableRealtime();
        $this->console->config()->disableEcho();
        $this->console->config()->disableCursor();
    }

    protected function restoreConsole()
    {
        $this->console->config()->disableRealtime();
        $this->console->config()->enableCursor();
        $this->console->config()->enableEcho();
    }

    protected function addListeners()
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
            ->add(Controls::$keymaps['ENTER'], function() {
                $this->selectActive();
            })
            ->run();
    }
}