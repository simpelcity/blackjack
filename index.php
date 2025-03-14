<?php

require_once 'Card.php';
require_once 'Player.php';
require_once 'Deck.php';

try {
    $deck = new Deck();
    $player = new PLayer('Maaike');

    $player->addCard($deck->drawCard());
    $player->addCard($deck->drawCard());
    $player->addCard($deck->drawCard());

    echo $player->showHand();
} catch (InvalidArgumentException $error) {
    echo "InvalidArgumentException: " . $error->getMessage();
}