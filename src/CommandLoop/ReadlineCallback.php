<?php

namespace CommandLoop;

class ReadlineCallback
{
    public function __construct()
    {
        $stdin = fopen('php://stdin', 'r');

        readline_callback_handler_install('', function () {});

        while (true) {
            // Values by reference
            $read = [$stdin];
            $write = null;
            $except = null;

            $stream = stream_select($read, $write, $except, null);

            if ($stream) {
                $char = ord(stream_get_contents($stdin, 1));
                echo "Char read: $char\n";
            }
        }
    }

    public function demo()
    {
        echo "Hello, world!";

        $stdin = fopen('php://stdin', 'r');

        readline_callback_handler_install('', function () {});

        while (true) {
            // Values by reference
            $read = [$stdin];
            $write = null;
            $except = null;

            $stream = stream_select($read, $write, $except, null);

            if ($stream) {
                $char = ord(stream_get_contents($stdin, 1));
                echo "Char read: $char\n";
            }
        }
    }
}