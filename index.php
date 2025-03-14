<?php

require_once 'Card.php';

try {
    $card1 = new Card('klaveren', 'boer');
    echo $card1->show();
    $card2 = new Card('ruiten', 'boer');
    echo $card2->show();
    $card3 = new Card('ruiten', 'vijf');
    echo $card3->show();
    $card4 = new Card('schoffels', 6);
    echo $card4->show();
} catch (InvalidArgumentException $error) {
    echo "InvalidArgumentException: " . $error->getMessage();
}