<?php

namespace Alphabetus\Bundle\Installer;

class Installer
{
    public static function run()
    {
        file_put_contents("text.txt", "works");
    }
}