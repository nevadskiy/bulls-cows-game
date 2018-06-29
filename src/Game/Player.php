<?php

namespace Game;

class Player
{
    protected $name;

    protected $game;

    public function __construct(string $name, BullsCows $game)
    {
        $this->name = $name;
        $this->game = $game;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function attempt(Combination $combination): Response
    {
        return $this->game->attempt($combination);
    }
}