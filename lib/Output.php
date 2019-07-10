<?php

class Output extends Message
{

    public static function create($text)
    {
        return new Output($text);
    }
}