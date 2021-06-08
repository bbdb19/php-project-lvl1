<?php

namespace Brain;

class Engine
{
    public function start(): string
    {
        $cli = new Cli();
        $name = $cli->welcome();
        return $name;
    }
}
