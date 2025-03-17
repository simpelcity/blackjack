<?php

require_once 'Card.php';
require_once 'Player.php';
require_once 'Deck.php';
require_once 'Blackjack.php';

try {
    $playerName = readline('Wat is je naam?...');

    $blackjack = new Blackjack();
    $deck = new Deck();
    $player = new Player($playerName, $blackjack);

    $player->addCard($deck->drawCard());
    $player->addCard($deck->drawCard());

    echo $player->showHand() . PHP_EOL;

    while (true) {
        $choice = readline('Nieuwe kaart (n) of stoppen (s)?...');

        if ($choice === 'n') {
            $newCard = $player->addCard($deck->drawCard());
            echo "Je kreeg een ", $newCard->show() . PHP_EOL;
            echo $player->showHand() . PHP_EOL;
            $score = $player->getScore();

            if ($score == "Busted") {
                echo "Busted!";
                exit;
            } elseif ($score == "Blackjack") {
                echo "Blackjack";
                exit;
            } elseif ($score == "Twenty-One") {
                echo "Twenty-One";
                exit;
            } elseif ($score == "Five Card Charlie") {
                echo "Five Card Charlie";
                exit;
            }
        } elseif ($choice === 's') {
            echo $score, "! ", $player->showHand() . PHP_EOL;
            exit;
        }
    }
} catch (Exception $error) {
    echo "Exception: " . $error->getMessage();
}