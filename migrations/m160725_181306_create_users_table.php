<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users`.
 */
class m160725_181306_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'name' => $this->string(),
            'access_token' => $this->string()->unique(),
            'auth_key' => $this->string()->unique(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
