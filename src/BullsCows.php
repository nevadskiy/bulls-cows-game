<?php

class BullsCows
{
    protected $attempts;

    protected $comparator;

    public function __construct(Combination $combination)
    {
        $this->attempts = new AttemptsCollection();
        $this->comparator = new Comparator($combination);
    }

    public function attempt(Combination $combination): Response
    {
        $this->attempts->add($combination);

        return $this->comparator->compare($combination);
    }
}