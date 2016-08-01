<?php

namespace app\models\pieces;

use yii\base\Model;

abstract class Piece extends Model
{
    const PIECES = [
        //white pieces
        'rw1' => ['default_x' => 1, 'default_y' => 1],
        'nw1' => ['default_x' => 2, 'default_y' => 1],
        'bw1' => ['default_x' => 3, 'default_y' => 1],
        'kw1' => ['default_x' => 4, 'default_y' => 1],
        'qw1' => ['default_x' => 5, 'default_y' => 1],
        'bw2' => ['default_x' => 6, 'default_y' => 1],
        'nw2' => ['default_x' => 7, 'default_y' => 1],
        'rw2' => ['default_x' => 8, 'default_y' => 1],

        'pw1' => ['default_x' => 1, 'default_y' => 2],
        'pw2' => ['default_x' => 2, 'default_y' => 2],
        'pw3' => ['default_x' => 3, 'default_y' => 2],
        'pw4' => ['default_x' => 4, 'default_y' => 2],
        'pw5' => ['default_x' => 5, 'default_y' => 2],
        'pw6' => ['default_x' => 6, 'default_y' => 2],
        'pw7' => ['default_x' => 7, 'default_y' => 2],
        'pw8' => ['default_x' => 8, 'default_y' => 2],

        //black pieces
        'rb1' => ['default_x' => 1, 'default_y' => 8],
        'nb1' => ['default_x' => 2, 'default_y' => 8],
        'bb1' => ['default_x' => 3, 'default_y' => 8],
        'kb1' => ['default_x' => 4, 'default_y' => 8],
        'qb1' => ['default_x' => 5, 'default_y' => 8],
        'bb2' => ['default_x' => 6, 'default_y' => 8],
        'nb2' => ['default_x' => 7, 'default_y' => 8],
        'rb2' => ['default_x' => 8, 'default_y' => 8],

        'pb1' => ['default_x' => 1, 'default_y' => 7],
        'pb2' => ['default_x' => 2, 'default_y' => 7],
        'pb3' => ['default_x' => 3, 'default_y' => 7],
        'pb4' => ['default_x' => 4, 'default_y' => 7],
        'pb5' => ['default_x' => 5, 'default_y' => 7],
        'pb6' => ['default_x' => 6, 'default_y' => 7],
        'pb7' => ['default_x' => 7, 'default_y' => 7],
        'pb8' => ['default_x' => 8, 'default_y' => 7],
    ];
}