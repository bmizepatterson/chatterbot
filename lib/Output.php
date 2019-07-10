<?php

class Output extends Message
{

    public $isFinal = false;

    public static function create($text)
    {
        return new Output($text);
    }
}