<?php

class App
{
    protected static $stdin;
    protected static $initialized = false;

    public static function init()
    {
        if (!static::$initialized) {
            static::$stdin = fopen('php://stdin', 'r');
        }
        static::$initialized = true;
    }

    public static function getInput()
    {
        while (true) {
            echo ">  ";
            $input = static::prepareInput(fgets(static::$stdin));
            if ($input) return $input;
        }
    }

    protected function prepareInput($input)
    {
        return trim($input);
    }
}