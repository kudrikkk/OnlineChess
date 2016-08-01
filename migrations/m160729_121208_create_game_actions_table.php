<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moves`.
 */
class m160729_121208_create_game_actions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('game_actions', [
            'id'        => $this->primaryKey(),
            'game_id'   => $this->integer()  ->notNull(),
            'piece_id'  => $this->string()   ->notNull(),
            'to_x'      => $this->integer()  ->notNull(),
            'to_y'      => $this->integer()  ->notNull(),
            'effect'    => $this->integer()  ->notNull(),
            'check'     => $this->boolean()  ->notNull(),
            'date'      => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('game_actions');
    }
}
