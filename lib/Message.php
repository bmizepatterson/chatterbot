<?php

class Message
{
    public $text;
    public $timestamp;

    public function __construct($text)
    {
        $this->text = $text;
        $this->timestamp = microtime(true);
    }
}