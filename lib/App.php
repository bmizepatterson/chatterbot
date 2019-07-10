<?php

class App
{
    protected $bot;
    protected static $stdin;
    protected static $colors = [
        'black'        => '0;30',
        'dark_gray'    => '1;30',
        'blue'         => '0;34',
        'light_blue'   => '1;34',
        'green'        => '0;32',
        'light_green'  => '1;32',
        'cyan'         => '0;36',
        'light_cyan'   => '1;36',
        'red'          => '0;31',
        'light_red'    => '1;31',
        'purple'       => '0;35',
        'light_purple' => '1;35',
        'brown'        => '0;33',
        'yellow'       => '1;33',
        'light_gray'   => '0;37',
        'white'        => '1;37',
    ];

    public function __construct()
    {
        static::$stdin = fopen('php://stdin', 'r');
    }

    public static function getInput()
    {
        while (true) {
            try {
                echo ">  ";
                $input = static::prepareInput(fgets(static::$stdin));
                if ($input) return $input;
            } catch (Exception $e) {
                break;
            }
        }
    }

    protected static function prepareInput($input)
    {
        return trim($input);
    }

    public function getBot()
    {
        if (is_null($this->bot)) {
            return new ChatterBot();
        }
        return $this->bot;
    }

    /**
     * Output a message to the user
     * 
     * @param Output $output
     */
    public static function output($output, $color = 'yellow')
    {
        echo "\n";
        echo "\033[" . static::$colors[$color] . "m";
        echo $output->message;
        echo "\033[0m"; 
        echo "\n\n";
    }
}