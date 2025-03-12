<?php

class Card {
    public string $suit;
    public string $value;

    function __construct($suit, $value)
    {
        var_dump($suit, $value);
    }
}