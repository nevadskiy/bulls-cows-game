<?php

namespace CommandLoop;

class Loop
{
    public static function infinity(callable $callback)
    {
        while (true) {
            $callback();
        }
    }

    public static function init(callable $callback)
    {
        $condition = true;
        while ($condition) {
            $condition = $callback();
        }
    }
}