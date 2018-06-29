<?php

namespace CommandLoop;

class LoopFactory
{
    public static function makeReadlineCallbackLoop()
    {
        return new ReadlineCallback();
    }

    public static function makeSttyLoop()
    {
        return new Stty();
    }
}