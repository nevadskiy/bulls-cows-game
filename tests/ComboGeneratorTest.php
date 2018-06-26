<?php

class ComboGeneratorTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_generate_valid_combination()
    {
        $combo = ComboGenerator::generate();

        $this->assertInstanceOf(Combination::class, $combo);
    }
}