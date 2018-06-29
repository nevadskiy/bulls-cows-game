<?php

class SelectOption
{
    protected $name;
    protected $onSelect;

    public function __construct(string $name, callable $onSelect)
    {
        $this->name = $name;
        $this->onSelect = $onSelect;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return void
     */
    public function activate(): void
    {
        return ($this->onSelect)();
    }
}