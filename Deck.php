<?php

class Deck
{
    private array $cards = [];

    public function __construct()
    {
        $suits = [
            'schoppen',
            'harten',
            'ruiten',
            'klaveren'
        ];
        
        $values = [
            'aas',
            'twee',
            'drie',
            'vier',
            'vijf',
            'zes',
            'zeven',
            'acht',
            'negen',
            'tien',
            'boer',
            'vrouw',
            'heer'
        ];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new Card($suit, $value);
            }
        }

        shuffle($this->cards);
    }

    public function drawCard(): Card
    {
        if (empty($this->cards)) {
            throw new Exception("Het deck is leeg");
        }

        return array_pop($this->cards);
    }
}