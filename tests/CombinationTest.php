<?php

class CombinationTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_be_inited_with_right_combination()
    {
        $combo = new Combination('1234');

        $this->assertEquals('1234', $combo->get());
    }

    /** @test */
    public function it_protect_against_repeated_digits()
    {
        $this->expectException(InvalidArgumentException::class);
        new Combination('1123');
    }

    /** @test */
    public function it_protect_against_strings()
    {
        $this->expectException(InvalidArgumentException::class);
        new Combination('asdb');
    }
}