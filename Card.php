<?php

class Card
{
    private string $suit;
    private string $value;

    public function __construct(string $suit, string $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function show(): string
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

        return $suits[$this->suit] . " " . $values[$this->value];
    }

    public function score(): int
    {
        $values = [
            'aas'   => 11,
            'twee' => 2,
            'drie' => 3,
            'vier' => 4,
            'vijf' => 5,
            'zes' => 6,
            'zeven' => 7,
            'acht' => 8,
            'negen' => 9,
            'tien' => 10,
            'boer'  => 10,
            'vrouw' => 10,
            'heer'  => 10
        ];

        return $values[$this->value];
    }
}