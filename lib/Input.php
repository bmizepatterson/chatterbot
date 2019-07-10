<?php

class Input extends Message
{
    
    public static function create($text)
    {
        return new Input($text);
    }
}