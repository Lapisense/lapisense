<?php

namespace Lapisense\Admin\Pages;

abstract class Page
{
    public function setup(): void
    {
        // This method can be overridden by implementing class to perform a specific setup
    }

    abstract public function output(): void;
}
