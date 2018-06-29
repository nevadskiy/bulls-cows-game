<?php

use Game\BullsCows;
use Game\Player;
use Game\Combination;

class PlayerTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_be_created()
    {
        $player = new Player('Vitalik', new BullsCows(new Combination('1234')));

        $this->assertEquals('Vitalik', $player->getName());
    }
}