<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 8/2/16
 * Time: 1:37 PM
 */

namespace app\models\pieces;


use app\models\Board;

class Queen extends Piece
{
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function getPossibleMoves(Board $board)
    {
        $possibleMoves = array_merge($this->getPossibleDiagonalMoves($board),
            $this->getPossibleHorizontalMoves($board),
            $this->getPossibleVerticalMoves($board));
        return $possibleMoves;
    }
}