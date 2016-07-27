<?php

use yii\db\Migration;

/**
 * Handles the creation for table `games`.
 */
class m160726_145935_create_games_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('games', [
            'id' => $this->primaryKey(),
            'user_id_white' => $this->integer()->defaultValue(0),
            'user_id_black' => $this->integer()->defaultValue(0),
            'is_finished' => $this->boolean()->defaultValue(0),
            'winner_id' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('games');
    }
}
