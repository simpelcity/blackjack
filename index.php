<?php

require_once 'Card.php';

$card1 = new Card('klaveren', 'boer');
$card2 = new Card('ruiten', 'boer');
$card3 = new Card('ruiten', 'vijf');
echo $card1->show();
echo $card2->show();
echo $card3->show();