<?php

namespace Alphabetus\Bundle\Installer;

class Installer
{
    public function run()
    {
        file_put_contents("text.txt", "works");
    }
}