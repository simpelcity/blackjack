<?php

class Player
{
    private string $name;
    private array $hand;
    private Blackjack $blackjack;

    public function __construct($name, Blackjack $blackjack)
    {
        $this->name = $name;
        $this->hand = [];
        $this->blackjack = $blackjack;
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

    public function getScore(): string
    {
        return $this->blackjack->scoreHand($this->hand);
    }
}