<?php

class ChatterBot
{
    protected $app;
    protected $lastOutput;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Begin the conversation
     */
    public function converse()
    {
        $this->greet();

        // For now, just repeat the user input back to them
        $this->say('You said: ' . $this->app->getInput());
    }

    protected function greet()
    {
        $this->say("Hello! I'm a chatterbot. How are you?");
    }

    protected function say($message)
    {
        $this->app->output(Output::create($message));
    }
}