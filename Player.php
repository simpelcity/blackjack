<?php

class Player
{
    private string $name;
    private array $hand;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->hand = [];
    }

    public function addCard(Card $card): Card
    {
        $this->hand[] = $card;
        return $card;
    }

    public function showHand()
    {
        $handDesc = $this->name . " has ";
        foreach ($this->hand as $card) {
            $handDesc .= $card->show() . " ";
        }
        return trim($handDesc);
    }

    public function name():string
    {
        return $this->name;
    }

    public function hand():array
    {
        return $this->hand;
    }
}