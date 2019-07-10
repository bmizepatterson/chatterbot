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
        return $this->matches([
            '/(good)?( |-)?bye$/i',
            '/see y(a|ou) ?(later)?$/i',
        ]) || $this->matches('/^(quit|end|exit|log o(ff|ut))$/i', true);
    }

    /**
     * Test whether a regex or array of regexes matches the text
     * 
     * @param array $regex  The regexes to search
     * @param boolean $global Whether to test against the entire input string
     *                        or against each individual input unit
     */
    protected function matches($regexes, $global = false)
    {
        if (!is_array($regexes)) {
            $regexes = [$regexes];
        }

        // Global searches test against the entire input string
        if ($global) {
            foreach ($regexes as $regex) {
                if (preg_match($regex, $this->text)) {
                    return true;
                }
            }
            return false;
        }

        // Unit searches test against each input unit
        foreach ($this->units as $unit) {
            foreach ($regexes as $regex) {
                if (preg_match($regex, $unit)) {
                    return true;
                }
            }
        }
        return false;
    }
}