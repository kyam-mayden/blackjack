<?php

$deck=['Hearts'=>['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'],
       'Clubs' =>['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'],
       'Spades'=>['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'],
     'Diamonds'=>['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King']
];
//all cards drawn so far
$cardsDrawn=[];

//array of dealers cards & suits
$dealer=[];

//array of players cards & suits
$player=[];

//array of dealer cards values
$dealerValueCards=[];

//array of player cards values
$playerValueCards=[];


function suitSelected(): string {
    $suits=['Hearts', 'Clubs', 'Spades', 'Diamonds'];
    return $suits[rand(0,3)];
}

function cardSelected($deck): string {
    $suit=suitSelected();
    $card = $deck[$suit][rand(0,count($deck[$suit])-1)];
    return $card." of ".$suit;
}

for($i=0; $i<4; $i++) {
    array_push($cardsDrawn, cardSelected($deck));
    if($i % 2 == 0) {
        array_push($dealer,$cardsDrawn[$i]);
        array_push($dealerValueCards, substr($dealer[$i/2], 0, 2));
        $card=explode(" of ",$dealer[$i/2]);
        unset($deck[$card[1]][$card[0]]);
    } else {
        array_push($player,$cardsDrawn[$i]);
        array_push($playerValueCards, substr($player[($i/2)], 0, 2));
        $card=explode(" of ",$player[$i/2]);
        unset($deck[$card[1]][$card[0]]);
    }
}

function getScore($array) {
    $score=0;
    for($i=0;$i<2;$i++) {
        switch($array[$i]) {
            case 'Ac':
                $score+= 11;
                break;
            case 'Qu':
                $score+= 10;
                break;
            case 'Ki':
                $score+= 10;
                break;
            case 'Ja':
                $score+= 10;
                break;
            default:
                $score+= $array[$i];
                break;
        }
    }
    return $score;
}


$playerScore=getScore($playerValueCards);
$dealerScore=getScore($dealerValueCards);
$scoreDiff = $playerScore-$dealerScore;
$negDiff = -$scoreDiff;


print nl2br("You have chosen $player[0]\n");
print nl2br("The dealer has chosen $dealer[0]\n");
print nl2br("You have chosen $player[1]\n");
print nl2br("The dealer has chosen $dealer[1]\n");

echo nl2br("You have scored $playerScore\n");
echo nl2br("The dealer has scored $dealerScore \n");

function winner ($player,$dealer,$diff,$neg): string {
    if ($player>$dealer){
        return "You won by a score of $diff!";
    } elseif ($player<$dealer) {
        return "You lost by a score of $neg!";
    } else {
        return "It's a draw!";
    }
}

echo winner($playerScore,$dealerScore,$scoreDiff,$negDiff);