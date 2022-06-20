<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredient}}`.
 */
class m220620_102414_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'recipe_id' =>$this->integer()->notNull(),
            'value' => $this->string()->notNull()
        ]);

        $this->createIndex(
            'idx-ingredient-recipe_id',
            'ingredient',
            'recipe_id'
        );

        $this->addForeignKey(
            'fk-ingredient-recipe_id',
            'ingredient',
            'recipe_id',
            'recipe',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-ingredient-recipe_id',
            'ingredient'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-ingredient-recipe_id',
            'ingredient'
        );

        $this->dropTable('{{%ingredient}}');
    }
}
