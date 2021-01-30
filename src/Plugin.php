<?php

namespace Lapisense;

use Lapisense\Dependencies\Pimple\Container;

class Plugin extends Container
{
    /** @var Bootstrap */
    private $bootstrap;

    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->bootstrap = new Bootstrap($this);
    }

    public function setup():void
    {
        $this->bootstrap->setup();
    }

    /**
     * @param string $class
     * @return mixed
     */
    public function make(string $class)
    {
        return $this[$class];
    }
}
