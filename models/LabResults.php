<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_results".
 *
 * @property int $id
 * @property int $user_id
 * @property string $test_type
 * @property string $date_taken
 * @property string|null $results
 * @property string|null $notes
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 */
class LabResults extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['results', 'notes'], 'default', 'value' => null],
            [['user_id', 'test_type', 'date_taken'], 'required'],
            [['user_id'], 'integer'],
            [['date_taken', 'created_at', 'updated_at'], 'safe'],
            [['results', 'notes'], 'string'],
            [['test_type'], 'string', 'max' => 255],
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
            'test_type' => 'Test Type',
            'date_taken' => 'Date Taken',
            'results' => 'Results',
            'notes' => 'Notes',
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
