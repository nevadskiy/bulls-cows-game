<?php

class BullsCowsTest extends \PHPUnit\Framework\TestCase
{
    protected $player;

    public function setUp()
    {
        $game = new BullsCows(new Combination('0123'));

        $this->player = new Player('Vitasik', $game);
    }

    /** @test */
    public function it_can_be_attemped_with_1234_and_get_compared_response()
    {
        $result = $this->player->attempt(new Combination('1234'));

        $this->assertInstanceOf(Response::class, $result);
        $this->assertEquals(3, $result->getCows());
        $this->assertEquals(0, $result->getBulls());
    }
}