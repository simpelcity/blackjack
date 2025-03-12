<?php

class Card
{
    public string $suit;
    public string $value;

    function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    function show(): string
    {
        $suits = [
            "schoppen" => "\u{2660}",
            "harten" => "\u{2665}",
            "ruiten" => "\u{2666}",
            "klaveren" => "\u{2663}"
        ];

        $values = [
            'aas'   => 'A',
            'twee' => 2,
            'drie' => 3,
            'vier' => 4,
            'vijf' => 5,
            'zes' => 6,
            'zeven' => 7,
            'acht' => 8,
            'negen' => 9,
            'tien' => 10,
            'boer'  => 'B',
            'vrouw' => 'V',
            'heer'  => 'H'
        ];

        return $suits[$this->suit] . " " . $values[$this->value] . PHP_EOL;
    }
}