<?php

class ChatterBot
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function greet()
    {
        $this->app->output("Hello! I'm a chatterbot. How are you?");
    }
}