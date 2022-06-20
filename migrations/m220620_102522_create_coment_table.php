<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coment}}`.
 */
class m220620_102522_create_coment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->notNull(),
            'user_id' => $this->integer(),
            'recipe_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-coment-recipe_id',
            'coment',
            'recipe_id'
        );

        $this->addForeignKey(
            'fk-coment-recipe_id',
            'coment',
            'recipe_id',
            'recipe',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-coment-user_id',
            'coment',
            'user_id'
        );

        $this->addForeignKey(
            'fk-coment-user_id',
            'coment',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-coment-recipe_id',
            'coment'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-coment-recipe_id',
            'coment'
        );

        $this->dropForeignKey(
            'fk-coment-user_id',
            'coment'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-coment-user_id',
            'coment'
        );

        $this->dropTable('{{%coment}}');
    }
}
