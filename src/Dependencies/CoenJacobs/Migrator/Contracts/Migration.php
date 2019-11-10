<?php

namespace Lapisense\Dependencies\CoenJacobs\Migrator\Contracts;

interface Migration
{
    public static function id();
    public function up();
    public function down();
}
