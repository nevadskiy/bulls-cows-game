<?php

namespace CLI;

class Configuration
{
    protected $output;

    protected $echo = true;

    protected $cursor = true;

    protected $realtime = false;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function disableEcho(): void
    {
        exec('stty -echo');
        $this->echo = false;
    }

    public function enableEcho(): void
    {
        exec('stty echo');
        $this->echo = true;
    }

    public function isEchoEnabled()
    {
        return $this->echo;
    }

    public function enableCursor(): void
    {
        $this->output->write("\033[?25h");
        $this->cursor = true;
    }

    public function disableCursor(): void
    {
        $this->output->write("\033[?25l");
        $this->cursor = false;
    }

    public function isCursorEnabled()
    {
        return $this->cursor;
    }

    public function disableRealtime()
    {
        exec('stty -cbreak');
        $this->realtime = false;
    }


    public function enableRealtime()
    {
        exec('stty cbreak');
        $this->realtime = true;
    }

    public function isRealtimeEnabled()
    {
        return $this->realtime;
    }
}