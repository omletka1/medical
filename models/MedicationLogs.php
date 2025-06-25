<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medication_logs".
 *
 * @property int $id
 * @property int $user_id
 * @property int $medication_id
 * @property string|null $dosage
 * @property string|null $time_taken
 * @property string|null $reason
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Medications $medication
 * @property User $user
 */
class MedicationLogs extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medication_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosage', 'time_taken', 'reason'], 'default', 'value' => null],
            [['user_id', 'medication_id'], 'required'],
            [['user_id', 'medication_id'], 'integer'],
            [['time_taken', 'created_at', 'updated_at'], 'safe'],
            [['reason'], 'string'],
            [['dosage'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['medication_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medications::class, 'targetAttribute' => ['medication_id' => 'id']],
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
            'medication_id' => 'Medication ID',
            'dosage' => 'Dosage',
            'time_taken' => 'Time Taken',
            'reason' => 'Reason',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Medication]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedication()
    {
        return $this->hasOne(Medications::class, ['id' => 'medication_id']);
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
