<?php

namespace Lapisense\Admin;

class Bootstrap
{
    /** @var Menu */
    public $menu;

    public function setup():void
    {
        $this->menu = new Menu();
        $this->menu->setup();
    }
}
