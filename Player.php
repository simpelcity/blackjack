<?php

class Player
{
    private string $name;
    private array $hand;

    public function __construct($name)
    {
        $this->name = $name;
        $this->hand = [];
    }

    public function addCard(Card $card)
    {
        $this->hand[] = $card;
    }

    public function showHand()
    {
        $handDesc = $this->name . " has ";
        foreach ($this->hand as $card) {
            $handDesc .= $card->show() . " ";
        }
        return $handDesc;
    }
}