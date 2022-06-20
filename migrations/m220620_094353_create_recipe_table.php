<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe}}`.
 */
class m220620_094353_create_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'image' => $this->string()->notNull(),
            'category_id' =>$this->integer(),
            'user_id' => $this->integer(),
            'viewedCount' => $this->integer()->defaultValue(0)->notNull()
        ]);

        $this->createIndex(
            'idx-recipe-user_id',
            'recipe',
            'user_id'
        );

        $this->addForeignKey(
            'fk-recipe-user_id',
            'recipe',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->createIndex(
            'idx-recipe-category_id',
            'recipe',
            'category_id'
        );

        $this->addForeignKey(
            'fk-recipe-category_id',
            'recipe',
            'category_id',
            'category',
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
            'fk-recipe-user_id',
            'recipe'
        );

        $this->dropIndex(
            'idx-recipe-user_id',
            'recipe'
        );

        $this->dropForeignKey(
            'fk-recipe-category_id',
            'recipe'
        );

        $this->dropIndex(
            'idx-recipe-category_id',
            'recipe'
        );

        $this->dropTable('{{%recipe}}');
    }
}
