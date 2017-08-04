<?php

/**
 * Class Tennis
 */
class Tennis
{
    //Tennis Player Property
    private $player1;
    private $player2;

    //Point Value
    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    //Construct our Player
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

    }

    //Score method
    public function score()
    {
        //Declare Winner
        if ($this->hasAWinner()) {
            return 'Win for ' . $this->winner()->name;
        }

        //Declare Advantage
        if ($this->hasTheAdvantage()) {
            return 'Advantage ' . $this->winner()->name;
        }

        //Declare Deuce 
        if ($this->hasDeuce()) {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * @return bool
     */
    private function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByTwo();
    }

    //if player has get to 4 and other is 3 Player get Advantage
    private function hasTheAdvantage()
    {
        //so if player get to 4 and also is 1 point head of another user it has advantage
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    private function hasDeuce()
    {
        //so if both player sore is 6 and also they both have same point 3 we have deuce
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    public function hasEnoughPointsToBeWon()
    {
        //so here as we see we first check if one of the player is max to 4 or more
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    public function isLeadingByTwo()
    {
        //and also if player point is more than 2 than other player we return absolute Point
        //it dose'nt matter if player 2 is great because of abs method 2-4 = -2 but with abs we have 2
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    //Check to see if player pint - another player is == 1
    public function isLeadingByOne()
    {
        return abs($this->player1->points - $this->player2->points) == 1;
    }

    //Winner Method so if player 1 score is more than player 2 then player 1 other wise 2
    public function winner()
    {
        return $this->player1->points > $this->player2->points
            ? $this->player1
            : $this->player2;
    }

    //Get general Score
    private function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';
        $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];

        return $score;
    }

    //method to declare if 2 player are tied
    private function tied()
    {
        return $this->player1->points == $this->player2->points;
    }
}
