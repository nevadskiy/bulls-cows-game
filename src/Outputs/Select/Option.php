<?php

namespace Outputs\Select;

class Option
{
    protected $name;

    protected $onSelected;

    protected $isActive = false;

    public function __construct(string $name, callable $onSelected)
    {
        $this->name = $name;
        $this->onSelected = $onSelected;
    }

    public function getName()
    {
        return $this->name;
    }

    public function activate()
    {
        $this->isActive = true;

        return $this;
    }

    public function deactivate()
    {
        $this->isActive = false;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function select(): void
    {
        ($this->onSelected)();
    }

    public function render(): string
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return ($this->isActive ? '> ' : '  ') . $this->name;
    }
}