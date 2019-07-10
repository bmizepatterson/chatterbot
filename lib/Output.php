<?php

class Output
{
    public $message;
    public $time;

    public function __construct($message)
    {
        $this->message = $message;
        $this->time = microtime(true);
    }

    public static function create($message)
    {
        return new Output($message);
    }
}