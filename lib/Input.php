<?php

class Input extends Message
{
    public $units;

    public function __construct($text)
    {
        parent::__construct($this->normalize($text));
        $this->units = preg_split('/[!,.;?] ?/', $this->text, null, PREG_SPLIT_NO_EMPTY);

        App::debug('Input units:');
        foreach ($this->units as $unit) {
            App::debug("\t[$unit]");
        }
    }

    /**
     * Normalize user input:
     *   - Replace consecutive spaces with a single space
     * 
     * @param string $text
     * @return string
     */
    protected function normalize($text)
    {
        return preg_replace('/\s\s+/', ' ', $text);
    }

    public static function create($text)
    {
        return new Input($text);
    }

    public function isRequestForExit()
    {
        if ($this->matches([
            '/(good)?( |-)?bye$/i',
            '/see y(a|ou) ?(later)?$/i',
        ])) {
            return true;
        }
        return false;
    }

    /**
     * Test whether a regex or array of regexes matches the text
     * 
     * @param array $regex  The regexes to search
     */
    protected function matches($regexes)
    {
        if (!is_array($regexes)) {
            $regexes = [$regexes];
        }
        foreach ($this->units as $unit) {
            foreach ($regexes as $regex) {
                if (preg_match($regex, $this->text)) {
                    return true;
                }
            }
        }
        return false;
    }
}