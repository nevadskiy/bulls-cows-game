<?php

namespace CommandLoop;

class Stty
{
    public function __construct(callable $callback)
    {
        // Input by one chat
        system('stty cbreak -echo'); // -echo means it doesnt echo input chars

        $stdin = fopen('php://stdin', 'r');

        while (true) {
            $char = ord(fgetc($stdin));

            $callback($char);
        }
    }

    public function demo()
    {
        echo "Hello, world!";

        // Input by one chat
        system('stty cbreak -echo'); // -echo meens it doesnt echo input chars

        $stdin = fopen('php://stdin', 'r');

        while (true) {
            $char = ord(fgetc($stdin));
            echo "Char read: $char\n";
        }
    }
}