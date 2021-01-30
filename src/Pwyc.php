<?php

namespace Pwyc;

class Pwyc
{
    private $replaced = array();
    private $synonyms = array();

    //construct
    function __construct()
    {
        $this->synonyms = require(dirname(__FILE__) . '/dict.php');
    }

    //replace
    function replace($text)
    {
        foreach ($this->synonyms as $key => $val) {
            if (preg_match("/" . $key . "/", $text) && !in_array($key, $this->replaced)) {
                $text = str_replace($key, $val, $text);
                array_push($this->replaced, $val);
            }
        }
        return $text;
    }
}
