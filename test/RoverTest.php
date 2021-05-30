<?php

use App\Models\Coordinate;
use App\Models\Grid;
use PHPUnit\Framework\TestCase as TestCase;
/*
 * Develop an API that moves a rover around on a grid
 *
 * RULE:
 * 1. You are given a initial starting point (0,0,N) of a rover.
 * 
 * 2. 0,0 are X, Y co-ordinates on a grid of (10,10).
 *
 * 3. N is the direction it is facing (i.e. N, S, E, W).
 *
 * 4. L and R alllow the rovers to rotate left and right
 *
 * 5. M allows the rovers to move one point in the current direction
 *
 * 6. The rovers receives a char array of commands. eg. RMMLM and returns the finishing point after the moves e.g. 2:1:N
 *
 * 7. The rover wraps around if it reaches the end of the grid.
 *
 * 8. The grid may have obstacles. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point and reports the e.g O:2:2:N
 *
 * */
use App\Models\Rover;

class RoverTest extends TestCase
{
    private $rover;
    protected function setUp(): void
    {
        parent::setUp(); //
        $this->rover = new Rover(new Grid());
    }

    public function commandTurnRightParameters() {
        // test with this values
        return array(
            array('R', '0:0:E'),
            array('RR', '0:0:S'),
            array('RRR', '0:0:W'),
            array('RRRR', '0:0:N'),
            // ...
        );
    }

    public function commandTurnLeftParameters() {
        // test with this values
        return array(
            array('L', '0:0:W'),
            array('LL', '0:0:S'),
            array('LLL', '0:0:E'),
            array('LLLL', '0:0:N'),
            // ...
        );
    }


    /**
     * @dataProvider commandTurnRightParameters
     * @param $input
     * @param $expectedResult
     */

    public function testShouldTurnRight($input, $expectedResult): void
    {
        $this->rover->execute($input);
        self::assertEquals( $expectedResult , $this->rover->currentPosition() );
    }

    /**
     * @dataProvider commandTurnLeftParameters
     * @param $input
     * @param $expectedResult
     */
    public function testShouldTurnLeft($input, $expectedResult): void
    {
        $this->rover->execute($input);
        self::assertEquals($expectedResult,$this->rover->currentPosition());
    }

    public function testShouldTurnRightRight(): void
    {
        $this->rover->execute("RR");
        self::assertEquals("0:0:S",$this->rover->currentPosition());
    }
    
    public function testShouldTurnLeftLeft(): void
    {
        $this->rover->execute("LL");
        self::assertEquals("0:0:S", $this->rover->currentPosition());
    }
    
    public function testShouldTurnRightLeft(): void
    {
        $this->rover->execute("RL");
        self::assertEquals( "0:0:N", $this->rover->currentPosition());
    }
    
    public function testShouldTurnLeftRight(): void
    {

        $this->rover->execute("LR");
        self::assertEquals("0:0:N",$this->rover->currentPosition());
    }

    public function testShouldTurnLeftRightLeft(): void
    {

        $this->rover->execute("LRL");
        self::assertEquals("0:0:W", $this->rover->currentPosition());
    }

    public function testShouldTurnLeftLeftLeft(): void
    {

        $this->rover->execute("LLL");
        self::assertEquals("0:0:E", $this->rover->currentPosition());
    }

    public function testShouldTurnRightLeftRight(): void
    {

        $this->rover->execute("RLR");
        self::assertEquals("0:0:E", $this->rover->currentPosition());
    }

    public function testShouldTurnRightRightRight(): void
    {

        $this->rover->execute("RRR");
        self::assertEquals("0:0:W",$this->rover->currentPosition());
    }

    public function testShouldTurnRightLeftRightLeft(): void
    {

        $this->rover->execute("RLRL");
        self::assertEquals("0:0:N", $this->rover->currentPosition());
    }

    public function testShouldTurnLeftRightLeftRight(): void
    {

        $this->rover->execute("LRLR");
        self::assertEquals("0:0:N", $this->rover->currentPosition());
    }

    public function testShouldMoveNorth(): void
    {

        $this->rover->execute("M");
        self::assertEquals("0:1:N", $this->rover->currentPosition());
    }

    public function testShouldMoveEast(): void
    {

        $this->rover->execute("RM");
        self::assertEquals("1:0:E", $this->rover->currentPosition());
    }

    public function commandWrapTopToBottom()
    {
        return array(
            array('MMMMMMMMMM', '0:0:N'),
            array('MMMMMMMMMMM', '0:1:N'),
            array('MMMMMMMMMMMMMMM', '0:5:N'),

            // ...
        );
    }
    /**
     * @dataProvider commandWrapTopToBottom
     * @param $input
     * @param $expectedResult
     */
    public function testShouldWrapFromTopToBottomWhenMovingNorth($input, $expectedResult): void
    {

        $this->rover->execute($input);
        self::assertEquals($expectedResult, $this->rover->currentPosition());
    }
    public function commandWrapFromBottomToTop()
    {
        return array(
            array('RRM', '0:9:N'),
            array('LLM', '0:9:N'),
            array('LLMM', '0:8:N'),
            array('LLMMM', '0:7:N'),


            // ...
        );
    }
    /**
     * @dataProvider commandWrapTopToBottom
     * @param $input
     * @param $expectedResult
     */
    public function testShouldWrapFromBottomToTopWhenMovingSouth($input, $expectedResult): void
    {

        $this->rover->execute($input);

        self::assertEquals($expectedResult, $this->rover->currentPosition());
    }
    public function commandWrapFromRightToLeft()
    {
        return array(
            array('RMMMMMMMMMM', '0:0:E'),
            array('RMMMMMMMMMMM', '1:0:E'),


            // ...
        );
    }
    /**
     * @dataProvider commandWrapTopToBottom
     * @param $input
     * @param $expectedResult
     */
    public function testShouldWrapBackFromLeftWhenMovingEast($input, $expectedResult): void
    {

        $this->rover->execute($input);
        self::assertEquals($expectedResult, $this->rover->currentPosition());
    }
    public function commandWrapFromLeftToRight()
    {
        return array(
            array('LMMMMMMMMMM', '0:0:W'),
            array('LMMMMMMMMMMM', '9:0:W'),


            // ...
        );
    }
    /**
     * @dataProvider commandWrapTopToBottom
     * @param $input
     * @param $expectedResult
     */
    public function testShouldWrapBackFromRightWhenMovingWest($input, $expectedResult): void
    {

        $this->rover->execute($input);
        self::assertEquals($expectedResult, $this->rover->currentPosition());
    }

 //* 6. The rovers receives a char array of commands. eg. RMMLM and returns the finishing point after the moves e.g. 2:1:N
    public function testShouldReturnFinishingPoint(): void
    {

        $this->rover->execute("RMMLM");
        self::assertEquals("2:1:N",$this->rover->currentPosition());
    }

    public function testShouldReturnObstaclePoint(): void
    {
        $grid = new Grid();
        $grid->setObstacle(new Coordinate(2,2));
        $rover = new Rover($grid);
        $rover->execute("RMMLMMMMMLR");
        self::assertEquals("O:2:2:N",$rover->currentPosition());

    }

}
