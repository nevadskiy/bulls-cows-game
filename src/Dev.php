<?php

use CommandLoop\LoopFactory;
use CLI\ConsoleFactory;
use Outputs\Select;

use CLI\Console;
use CLI\KeyListener;
use CommandLoop\Loop;

class Dev
{
    public function __construct()
    {
        $console = Console::make();

//        (new KeyListener($console))
//            ->add(65, function() {
//                echo 'GET DOWN';
//
//                return true;
//            })
//            ->run();

        (new Select\Menu($console))
            ->addOption(new Select\Option('First option', function() {

            }))
            ->addOption(new Select\Option('Second option', function() {

            }))
            ->show();

//        $console->config()->disableEcho();

//        $console->config()->enableRealtime();

//
//        Loop::init(function() use ($console) {
//            $char = $console->read();
//
//            $char = ord($char);
//
//            echo $char, "\n";
//
//            return true;
//        });


//        $console->config()->disableRealtime();

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





//        $loop = new Stty(function($key) use ($console) {
//            if ($key === 68) {
//                $console->clear();
////                $console->write('Clear');
//                $console->move()->toLine(1);
////                $terminal->moveCursorToRow(0);
//            } else if ($key === 67) {
////                $terminal->moveCursorToRow(1);
////            } else if ($key === 66) {
////                $console->read(10);
//            } else {
//                echo "Char: {$key}\n";
//            }
//        });
    }
}