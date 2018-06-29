<?php

use Game\Comparator;
use Game\Combination;

class ComparatorTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_compare_1234_with_2345()
    {
        $comp = new Comparator(new Combination('1234'));

        $result = $comp->compare(new Combination('2345'));

        $this->assertEquals(3, $result->getCows());
        $this->assertEquals(0, $result->getBulls());
    }

    /** @test */
    public function it_can_compare_1324_with_1234()
    {
        $comp = new Comparator(new Combination('1324'));

        $result = $comp->compare(new Combination('1234'));

        $this->assertEquals(2, $result->getCows());
        $this->assertEquals(2, $result->getBulls());
    }

    /** @test */
    public function it_can_compare_4567_with_4567()
    {
        $comp = new Comparator(new Combination('4567'));

        $result = $comp->compare(new Combination('4567'));

        $this->assertEquals(0, $result->getCows());
        $this->assertEquals(4, $result->getBulls());
    }
}