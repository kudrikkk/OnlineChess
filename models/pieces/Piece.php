<?php

namespace app\models\pieces;

use yii\base\Model;

abstract class Piece extends Model
{
    public static function onBoard($x, $y)
    {
        return (1 <= $x) && ($x <= 8) && (1 <= $y) && ($y <= 8);
    }
}