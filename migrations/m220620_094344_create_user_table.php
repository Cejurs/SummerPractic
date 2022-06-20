<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220620_094344_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username'=>$this->string()->notNull()->unique(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'role' =>$this->string()->defaultValue('user')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
