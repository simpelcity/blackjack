<?php

require_once 'Blackjack.php';
require_once 'Card.php';
require_once 'Dealer.php';
require_once 'Deck.php';
require_once 'Player.php';

// $presetDeck = new Deck([
//     new Card('ruiten', 'aas'), new Card('ruiten', 'tien'),
//     new Card('schoppen', 'vijf'), new Card('schoppen', 'zes'),
//     new Card('harten', 'negen'), new Card('harten', 'negen')
// ]);

$dealer = new Dealer(new Blackjack(), new Deck());
$dealer->addPlayer(new Player('Ischa'));
$dealer->addPlayer(new Player('Merel'));
$dealer->playGame();