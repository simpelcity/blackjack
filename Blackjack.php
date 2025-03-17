<?php

class Blackjack
{
    public function scoreHand(array $hand): string
    {
        $score = 0;

        foreach ($hand as $card) {
            $score += $card->score();
        }

        if ($score > 21) {
            return "Busted";
            exit;
        } elseif ($score === 21 && count($hand) === 2) {
            return "Blackjack";
            exit;
        } elseif ($score === 21) {
            return "Twenty-One";
            exit;
        } elseif (count($hand) === 5) {
            return "Five Card Charlie";
            exit;
        } else {
            return (string)$score;
        }
    }
}