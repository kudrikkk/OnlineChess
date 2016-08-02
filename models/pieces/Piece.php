<?php

namespace app\models\pieces;

use app\models\Board;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\base\Model;

abstract class Piece extends Model
{
    public $color;
    public $piece_id;
    public $x;
    public $y;

    function __construct(array $config)
    {
        parent::__construct($config);

        if (!isset($config['x']) || !isset($config['y']) || !isset($config['color']) || !isset($config['piece_id'])) {
            throw new InvalidConfigException();
        }
    }

    public static function onBoard($x, $y)
    {
        return (1 <= $x) && ($x <= 8) && (1 <= $y) && ($y <= 8);
    }

    public function getFigureColor($board, $x, $y)
    {
        return $this->color;
    }

    abstract function getPossibleMoves(Board $board);

    abstract function isMovePossible(Board $board);

    static function pieceFactory($piece_id, $x, $y)
    {
        if ($piece_id === '') {
            return new EmptyCell([
                'color' => '',
                'piece_id' => '',
                'x' => $x,
                'y' => $y,
            ]);
        }

        $config = [
            'color' => $piece_id[1],
            'piece_id' => $piece_id,
            'x' => $x,
            'y' => $y,
        ];

        switch ($piece_id[0]) {
            case 'p':
                return new Pawn($config);
            case 'r':
                return new Rook($config);
            case 'n':
                return new Knight($config);
            case 'b':
                return new Bishop($config);
            case 'k':
                return new King($config);
            case 'q':
                return new Queen($config);
        }

        throw new Exception();
    }
}