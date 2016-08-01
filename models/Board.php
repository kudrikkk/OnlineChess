<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 7/30/16
 * Time: 9:31 PM
 */

namespace app\models;

use app\models\pieces\Piece;
use yii\base\Model;

class Board extends Model
{
    public static function getBoard($game_id)
    {
        $game = Game::findOne($game_id);
        if (!$game) {
            return null;
        }

        $pieces = [];
        foreach (Piece::PIECES as $key => $item) {
            $lastTime = GameAction::find()
                ->where(['game_id' => $game_id, 'piece_id' => $key])
                ->orderBy('id DESC')
                ->limit(1)
                ->one();

            $captured = false;
            if ($lastTime && GameAction::find()
                    ->where(['game_id' => $game_id])
                    ->andWhere(['>', 'id', $lastTime->id])
                    ->one()) {

                $captured = true;
            } else if (!$lastTime && GameAction::find()
                    ->where(['game_id' => $game_id])
                    ->andWhere(['to_x' => Piece::PIECES[$key]['default_x']])
                    ->andWhere(['to_y' => Piece::PIECES[$key]['default_y']])
                    ->one()) {


            }

            if ($captured) { }
            else if (!$lastTime) {
                array_push($pieces, [
                    'id' => $key,
                    'x'  => Piece::PIECES[$key]['default_x'],
                    'y'  => Piece::PIECES[$key]['default_y'],
                    'isSelected' => false,
                ]);
            } else {
                array_push($pieces, [
                    'id' => $key,
                    'x'  => $lastTime->to_x,
                    'y'  => $lastTime->to_y,
                    'isSelected' => false,
                ]);
            }
        }

        return $pieces;
    }
}