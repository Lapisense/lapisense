<?php

namespace Lapisense\Admin;

class Bootstrap
{
    /** @var Menu */
    public $menu;

    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function setup():void
    {
        $this->menu->setup();
    }
}
