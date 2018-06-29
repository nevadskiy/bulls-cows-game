<?php

use CommandLoop\LoopFactory;
use CommandLoop\Stty;
use CLI\ConsoleFactory;
use CLI\Outputs\Select;

use PhpSchool\Terminal\UnixTerminal;
use PhpSchool\Terminal\IO\ResourceInputStream;
use PhpSchool\Terminal\IO\ResourceOutputStream;
use CLI\Console;

class Dev
{
    public function __construct()
    {
//        LoopFactory::makeSttyLoop();
        $console = Console::make();
        $console->config()->disableEcho();
        $console->config()->enableRealtime();

        $char = $console->read();

        echo $char, "\n";

        $console->config()->disableRealtime();

//        $console->config()->disableEcho();
//        $console->config()->disableEcho();
//        $console->config()->disableEcho();


//        $char = $console->read();
//        echo $char;
//        $console->config()->disableCursor();
//        $char2 = $console->read();
//        $console->config()->enableCursor();
//        echo $char2;

//        $terminal = new UnixTerminal(new ResourceInputStream, new ResourceOutputStream);





        $loop = new Stty(function($key) use ($console) {
            if ($key === 68) {
                $console->clear();
//                $console->write('Clear');
                $console->move()->toLine(1);
//                $terminal->moveCursorToRow(0);
            } else if ($key === 67) {
//                $terminal->moveCursorToRow(1);
//            } else if ($key === 66) {
//                $console->read(10);
            } else {
                echo "Char: {$key}\n";
            }
        });
    }
}