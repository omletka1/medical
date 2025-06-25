<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedures".
 *
 * @property int $id
 * @property int $user_id
 * @property string $procedure_name
 * @property string $date_performed
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 */
class Procedures extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['user_id', 'procedure_name', 'date_performed'], 'required'],
            [['user_id'], 'integer'],
            [['date_performed', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['procedure_name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'procedure_name' => 'Procedure Name',
            'date_performed' => 'Date Performed',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
