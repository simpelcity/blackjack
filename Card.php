<?php

class Card
{
    private string $suit;
    private string $value;

    private function validateSuit(string $suit)
    {
        $validSuits = ['schoppen', 'harten', 'ruiten', 'harten', 'klaveren'];
        if (!in_array($suit, $validSuits)) {
            throw new InvalidArgumentException('Invalid suit given: ' . $suit);
        }
    }

    private function validateValue(string $value)
    {
        if (is_numeric($value)) {
            throw new InvalidArgumentException('Value cannot be a number!');
        }
    }

    public function __construct(string $suit, string $value)
    {
        $this->validateSuit($suit);
        $this->validateValue($value);

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

        return $suits[$this->suit] . " " . $values[$this->value] . PHP_EOL;
    }
}