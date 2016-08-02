<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 8/2/16
 * Time: 1:37 PM
 */

namespace app\models\pieces;


use app\models\Board;

class Pawn extends Piece
{
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function getPossibleMoves(Board $board)
    {
        if ($this->color === 'w') {
            return $this->getPossibleMovesWhite($board);
        }
        if ($this->color === 'b') {
            return $this->getPossibleMovesBlack($board);
        }
    }

    private function getPossibleMovesWhite($board)
    {
        if ($this->y === 8) return [];

        $array = [];
        $x = $this->x;
        $y = $this->y;
        $straight = $board[$x][$y + 1];
        if ($straight->isEmptyCell()) {
            $array[] = ['x' => $x, 'y' => $y+1];
        }
        
        $straightLeft = $board[x-1][y+1];
        if ($x != 1 && !$straightLeft->isEmptyCell() && !self::areSameColor($this, $straightLeft)) {
            $array[] = ['x' => $x-1, 'y' => $y+1];
        }
        
        $straightRight = $board[x+1][y+1];
        if ($x != 8 && !$straightRight->isEmptyCell() && !self::areSameColor($this, $straightRight)) {
            $array[] = ['x' => $x+1, 'y' => $y+1];
        }

        return $array;
    }

    private function getPossibleMovesBlack($board)
    {
        if ($this->y === 1) return [];

        $array = [];
        $x = $this->x;
        $y = $this->y;
        $straight = $board[$x][$y - 1];
        if ($straight->isEmptyCell()) {
            $array[] = ['x' => $x, 'y' => $y-1];
        }

        $straightLeft = $board[x-1][y-1];
        if ($x != 1 && !$straightLeft->isEmptyCell() && !self::areSameColor($this, $straightLeft)) {
            $array[] = ['x' => $x-1, 'y' => $y-1];
        }

        $straightRight = $board[x+1][y-1];
        if ($x != 8 && !$straightRight->isEmptyCell() && !self::areSameColor($this, $straightRight)) {
            $array[] = ['x' => $x+1, 'y' => $y-1];
        }

        return $array;
    }
}