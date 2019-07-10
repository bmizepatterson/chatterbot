<?php

class App
{
    protected $stdin;
    protected $bot;

    public function __construct()
    {
        $this->stdin = fopen('php://stdin', 'r');
    }

    public function getInput()
    {
        while (true) {
            try {
                echo ">  ";
                $input = $this->prepareInput(fgets($this->stdin));
                if ($input) return $input;
            } catch (Exception $e) {
                break;
            }
        }
    }

    protected function prepareInput($input)
    {
        return trim($input);
    }

    public function getBot()
    {
        if (is_null($this->bot)) {
            return new ChatterBot($this);
        }
        return $this->bot;
    }

    /**
     * Output a message to the user
     * 
     * @param Output $output
     */
    public function output($output)
    {
        echo "\n\n" . $output->message . "\n\n";
    }
}