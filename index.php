<?php

require_once 'Blackjack.php';
require_once 'Card.php';
require_once 'Dealer.php';
require_once 'Deck.php';
require_once 'Player.php';

$presetCards = [
    new Card('klaveren', 'zes'),
    new Card('klaveren', 'negen'),

    new Card('schoppen', 'vijf'),
    new Card('schoppen', 'boer'),

    new Card('ruiten', 'zeven'),
    new Card('ruiten', 'vijf'),

    new Card('ruiten', 'negen'),
    new Card('ruiten', 'aas'),
];

$presetDeck = new Deck($presetCards);

$dealer = new Dealer(new Blackjack(), new Deck());
$dealer->addPlayer(new Player('Ischa'));
$dealer->addPlayer(new Player('Merel'));
$dealer->playGame();