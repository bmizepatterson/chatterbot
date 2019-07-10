<?php

class ChatterBot
{
    protected $lastOutput;

    /**
     * Begin the conversation
     */
    public function converse()
    {
        $this->greet();

        // For now, just repeat the user input back to them
        $this->say('You said: "' . App::getInput() . '"');
    }

    protected function greet()
    {
        $this->say("Hello! I'm a chatterbot. How are you?");
    }

    protected function say($message)
    {
        $this->lastOutput = $message;
        App::output(Output::create($message));
    }
}