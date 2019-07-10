<?php

class ChatterBot
{
    protected $lastOutput;

    /**
     * Begin the conversation
     */
    public function converse()
    {
        App::output($this->greet());
        
        while (true) {
            $response = $this->interpret(App::getInput());
            $this->lastOutput = $response;
            App::output($response);
            if ($response->isFinal) {
                break;
            }
        }
    }

    protected function greet()
    {
        return Output::create("Hello! I'm a chatterbot. How are you?");
    }

    protected function sayGoodbye()
    {
        return Output::create("Bye");
    }

    /**
     * Interpret user input and calculate a response
     * 
     * @param Input $input
     * @return Output
     */
    protected function interpret($input)
    {
        if ($input->isRequestForExit()) {
            $output = $this->sayGoodbye();
            $output->isFinal = true;
            return $output;
        }
        // For now, just repeat the user input back to them
        return Output::create('You said: "' . $input->text . '"');
    }
}