<?php

use PHPUnit\Framework\TestCase;

require('../blackjack.php');

class StackTest extends TestCase
{
    //winner()

    //success
    public function testwinnerSuccessPlayer ()
    {
        $expected='You won by a score of 5!';
        $input1=5;
        $input2=0;
        $input3=5;
        $input4=0;
        $case= winner($input1,$input2,$input3,$input4);
        $this->assertEquals($case, $expected);
    }

    public function testwinnerSuccessDealer ()
    {
        $expected="You lost by a score of 5!";
        $input1=0;
        $input2=5;
        $input3=0;
        $input4=5;
        $case= winner($input1,$input2,$input3,$input4);
        $this->assertEquals($case, $expected);
    }

    public function testwinnerSuccessDraw ()
    {
        $expected="It's a draw!";
        $input1=5;
        $input2=5;
        $input3=0;
        $input4=0;
        $case= winner($input1,$input2,$input3,$input4);
        $this->assertEquals($case, $expected);
    }


    //failure

    public function testwinnerFailureJugglingStr ()
    {
        $expected='You won by a score of 5!';
        $input1='5';
        $input2='0';
        $input3='5';
        $input4='0';
        $case= winner($input1,$input2,$input3,$input4);
        $this->assertEquals($case, $expected);
    }

    public function testwinnerFailureJugglingDbl ()
    {
        $expected='You won by a score of 5!';
        $input1=5.0;
        $input2=0.0;
        $input3=5.0;
        $input4=0.0;
        $case= winner($input1,$input2,$input3,$input4);
        $this->assertEquals($case, $expected);
    }


    //malformed
    public function testwinnerMalformedArr ()
    {
        $expected='You won by a score of 5!';
        $input1=[];
        $input2=[];
        $input3=[];
        $input4=[];
        $this->expectException(TypeError::class);
        winner($input1,$input2,$input3,$input4);
    }


    //getScore()
    //success

    public function testgetScoreSuccessFaces ()
    {
        $expected=21;
        $input1=['Qu','Ac'];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }

    public function testgetScoreSuccessNumbers ()
    {
        $expected=5;
        $input1=[3,2];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }

    public function testgetScoreSuccessMixed ()
    {
        $expected=12;
        $input1=['Ja',2];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function testgetScoreFailureMixed ()
    {
        $expected=12;
        $input1=['Ja','2'];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }

    public function testgetScoreFailureStrings ()
    {
        $expected=8;
        $input1=['6','2'];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }

    public function testgetScoreFailureDbl ()
    {
        $expected=8;
        $input1=[6.0,2.0];
        $case= getScore($input1);
        $this->assertEquals($case, $expected);
    }



    //suitSelected
    //success
    public function testsuitSelectedSuccess ()
    {
        $expected = ['Hearts', 'Clubs', 'Spades', 'Diamonds'];
        $case = suitSelected();
        $this->assertContains($case, $expected);
    }

    public function testsuitSelectedSuccessEndsS ()
    {
        $expected='s';
        $case = suitSelected();
        $this->assertStringEndsWith($expected, $case);
    }

    //malformed

    public function testgetScoreMalformedStr ()
    {
        $input1=6;
        $this->expectException(TypeError::class);
        getScore($input1);
    }




//    //cardSelected
//    public function testCardSelectedSuccess ()
//    {
//
//    }

}