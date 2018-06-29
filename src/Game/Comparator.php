<?php

namespace Game;

class Comparator
{
    protected $combination;

    public function __construct(Combination $combination)
    {
        $this->combination = $combination;
    }

    public function compare(Combination $combination): Response
    {
        $response = new Response();

        for ($i = 0; $i < 4; $i++) {
            if ($combination->get($i) === $this->combination->get($i)) {
                $response->incrementBulls();
                continue;
            }

            if (strpos($combination->get(), $this->combination->get($i)) !== false) {
                $response->incrementCows();
                continue;
            }
        }

        return $response;
    }
}