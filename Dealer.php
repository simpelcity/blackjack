<?php

class Dealer
{
    private Blackjack $blackjack;
    private Deck $deck;
    private array $players;

    public function __construct(Blackjack $blackjack, Deck $deck)
    {
        $this->blackjack = $blackjack;
        $this->deck = $deck;
        $this->players = [];
        $this->addPlayer(new Player('Dealer'));
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function getScore(Player $player): string
    {
        return $this->blackjack->scoreHand($player->hand());
    }

    public function dealCard(Player $player): Card
    {
        $card = $this->deck->drawCard();
        $player->addCard($card);
        return $card;
    }

    public function playGame()
    {
        foreach ($this->players as $player) {
            $this->dealCard($player);
            $this->dealCard($player);
        }

        foreach ($this->players as $player) {
            if ($this->getScore($player) === 'Blackjack') {
                
                echo $player->name() . " wins! " . $this->getScore($player) . "!" . PHP_EOL;
                foreach ($this->players as $player) {
                    echo $player->showHand() . " -> " . $this->getScore($player) . PHP_EOL;
                }
                return;
            }
        }

        if ($this->getScore($this->players[0]) === 'Blackjack') {
            echo "Dealer has Blackjack! Game over." . PHP_EOL;
            return;
        }

        $activePlayers = array_fill_keys(array_keys($this->players), true);

        while (in_array(true, $activePlayers)) {
            foreach ($this->players as $key => $player) {
                if (!$activePlayers[$key]) {
                    continue;
                }

                if ($player->name() === 'Dealer') {
                    if ($this->getScore($player) <= 18) {
                        echo $player->showHand() . PHP_EOL;
                        $newCard = $this->dealCard($player);
                        echo "Dealer drew " . $newCard->show() . PHP_EOL;

                        if ($this->getScore($player) === 'Busted') {
                            echo "Dealer is Busted!: " . $player->showHand() . PHP_EOL;
                            $activePlayers[$key] = false;
                        }
                    } else {
                        echo $player->showHand() . PHP_EOL;
                        echo $player->name() . " stops." . PHP_EOL;
                        $activePlayers[$key] = false;
                    }
                    continue;
                }

                $score = $this->getScore($player);

                if (in_array($score, ['Five Card Charlie'])) {
                    echo $player->name() . " is " . $score . "." . PHP_EOL;
                    $activePlayers[$key] = false;
                    continue;
                } elseif (in_array($score, ['Twenty-One'])) {
                    echo $player->name() . " is " . $score . PHP_EOL;
                    $activePlayers[$key] = false;
                    continue;
                }

                $choice = readline($player->name() . "'s turn. " . $player->showHand() . ". " . "'draw' or 'stop'?..." . PHP_EOL);

                if ($choice === 'd' || $choice === 'draw') {
                    $newCard = $this->dealCard($player);
                    echo $player->name() . " drew " . $newCard->show() . PHP_EOL;
                    
                    if ($this->getScore($player) === 'Busted') {
                        $activePlayers[$key] = false;
                    }
                } elseif ($choice === 's' || $choice === 'stop') {
                    echo $player->name() . " stops." . PHP_EOL;
                    $activePlayers[$key] = false;
                }
            }
        }

        $dealerScore = $this->getScore($this->players[0]);

        if ($dealerScore === 'Busted') {
            $winners = [];
            $highestScore = 0;

            foreach ($this->players as $player) {
                if ($player->name() !== 'Dealer') {
                    $playerScore = $this->getScore($player);
                    if ($playerScore == 21 || $playerScore === 'Twenty-One') {
                        $winners[] = $player->name();
                        $playerScore = 21;
                    }
                    $playerScore = $this->getScore($player);
                    if ($playerScore > $highestScore && $playerScore !== 'Busted') {
                        $highestScore = $playerScore;
                        $winners[] = $player->name();
                    }
                }
            }

            if ($winners) {
                foreach ($winners as $winner) {
                    echo $winner . " wins!" . PHP_EOL;
                }
            } else {
                echo "no winners" . PHP_EOL;
            }
        } else {
            foreach ($this->players as $player) {
                if ($player->name() !== 'Dealer') {
                    $playerScore = $this->getScore($player);

                    if ($playerScore == 21 || $playerScore === 'Twenty-One') {
                        $playerScore = 21;
                    }

                    if ($playerScore  === 'Busted') {
                        echo $player->name() . " is Busted." . PHP_EOL;
                    } elseif ($playerScore > $dealerScore && $playerScore <= 21) {
                        echo $player->name() . " wins with " . $playerScore . "!" . PHP_EOL;
                    } elseif ($dealerScore >= $playerScore || $playerScore === 'Busted') {
                        echo "Dealer wins against " . $player->name() . " with " . $dealerScore . "!" . PHP_EOL;
                    }
                }
            }
        }

        foreach ($this->players as $player) {
            echo $player->showHand() . " -> " . $this->getScore($player) . PHP_EOL;
        }
    }
}