<?php

namespace CLI;

class Console
{
    protected $input;
    protected $output;

    protected $cols;
    protected $lines;

    protected $move;
    protected $config;

    public function __construct(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;

        $this->cols = (int) exec('tput cols');
        $this->lines = (int) exec('tput lines');

        $this->move = new Move($output);
        $this->config = new Configuration($output);
    }

    public static function make()
    {
        return new self(new Input(STDIN), new Output(STDOUT));
    }

    public function getCols()
    {
        return $this->cols;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function clear(): void
    {
        $this->output->write("\033[2J");
        $this->move->toTop();
    }

    public function write(string $buffer): void
    {
        $this->output->write($buffer);
    }

    public function read()
    {
        $byChar = $this->config->isRealtimeEnabled();

        return $this->input->read($byChar);
    }

    public function move()
    {
        return $this->move;
    }

    public function config()
    {
        return $this->config;
    }
}