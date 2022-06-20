<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $image
 * @property string|null $role
 *
 * @property Coment[] $coments
 * @property Recipe[] $recipes
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'image'], 'required'],
            [['username', 'email', 'password', 'image', 'role'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'image' => 'Image',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Coments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComents()
    {
        return $this->hasMany(Coment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Recipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['user_id' => 'id']);
    }
}
