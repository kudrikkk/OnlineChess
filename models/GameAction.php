<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "game_actions".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $piece_id
 * @property integer $to_x
 * @property integer $to_y
 * @property integer $effect
 * @property string $date
 */
class GameAction extends ActiveRecord
{
    const REGULAR_MOVE = 0;
    const CAPTURE      = 1;
    const CASTLING     = 2;
    const EN_PASSANT   = 3;
    const PROMOTION    = 4;
    const CHECKMATE    = 5;
    const STALEMATE    = 6;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'piece_id', 'to_x', 'to_y', 'effect'], 'required'],
            [['game_id', 'to_x', 'to_y', 'effect'], 'integer'],
            [['date'], 'safe'],
            [['piece_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'piece_id' => 'Piece ID',
            'to_x' => 'To X',
            'to_y' => 'To Y',
            'effect' => 'Effect',
            'date' => 'Date',
        ];
    }
}