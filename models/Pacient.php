<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pacient".
 *
 * @property int $id
 * @property string $username
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property int $created_at
 * @property int $updated_at
 * @property string $email
 */
class Pacient extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pacient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patronymic'], 'default', 'value' => null],
            [['id', 'username', 'surname', 'name', 'created_at', 'updated_at', 'email'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'surname', 'patronymic', 'email'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 45],
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
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'email' => 'Email',
        ];
    }

}
