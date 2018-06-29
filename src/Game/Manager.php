<?php

namespace Game;

use CLI\Console;
use CLI\ConsoleFactory;
use CLI\Input;
use CLI\Output;
use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;

class Manager
{
    public static function start()
    {
        return new self();
    }

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $console = ConsoleFactory::createUnixTerminal();

        $console->write('Hello!');

        sleep(2);

        $console->clear();



//        $itemCallable = function (CliMenu $menu) {
//            echo $menu->getSelectedItem()->getText();
//        };
//
//        $menu = (new CliMenuBuilder)
////            ->disableDefaultItems()
//            ->setTitle('Welcome to Bulls Cows Game')
//            ->setForegroundColour('black')
//            ->addItem('One player', $itemCallable)
//            ->addItem('Two player', $itemCallable)
//            ->addItem('Two player (Online)', $itemCallable)
//            ->addItem('Two player (vs AI)', $itemCallable)
//            ->addLineBreak('-')
//            ->build();
//
//
//        $menu->open();
    }
}