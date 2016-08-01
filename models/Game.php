<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\user\User;

/**
 * This is the model class for table "games".
 *
 * @property integer $id
 * @property integer $user_id_white
 * @property integer $user_id_black
 * @property integer $is_finished
 * @property integer $winner_id
 */
class Game extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id_white', 'user_id_black', 'is_finished', 'winner_id'], 'integer'],
            //[['is_finished'], 'required']
        ];
    }

    public static function findAwaitingGame($user_id)
    {
        if (!($user = User::findIdentity($user_id))) {
            return false;
            //TODO: exception
        }
        $game = self::find()
            ->where(['or', ['user_id_black' => 0], ['user_id_white' => 0]])
            ->andWhere([
                'and',
                ['not', ['user_id_black' => $user_id]],
                ['not', ['user_id_white' => $user_id]]
            ])
            ->limit(1)
            ->one();
        return $game;
    }

    public static function create($user_id, $to_be_white = true)
    {
        $game = new Game();

        if ($to_be_white) {
            $game->user_id_white = $user_id;
        } else {
            $game->user_id_black = $user_id;
        }

        $game->save();
        return $game;
    }

    public function alreadyBegan()
    {
        return $this->user_id_white != 0 && $this->user_id_black != 0;
    }

    public function surrender($user_id)
    {
        if (!$this->alreadyBegan()) {
            return false;
        }
        if ($this->is_finished) {
            return false;
        }

        if ($this->user_id_white === $user_id) {
            $this->winner_id = $this->user_id_black;
        } else if ($this->user_id_black === $user_id) {
            $this->winner_id = $this->user_id_white;
        } else {
            return false;
        }

        $this->is_finished = true;
        return $this->save();
    }

    public function join($user_id)
    {
        if ($this->isNewRecord) {
            return false;
        }
        if ($this->alreadyBegan()) {
            return false;
        }

        if ($this->user_id_white !== 0) {
            $this->user_id_black = $user_id;
        } else {
            $this->user_id_white = $user_id;
        }

        return $this->save();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id_white' => 'User Id White',
            'user_id_black' => 'User Id Black',
            'is_finished' => 'Is game finished',
            'winner_id' => 'Winner ID',
        ];
    }

    public function getBoard()
    {

    }
}