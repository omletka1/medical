<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor_visits".
 *
 * @property int $id
 * @property int $user_id
 * @property int $doctor_id
 * @property string $visit_date
 * @property string|null $notes
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Doctors $doctor
 * @property User $user
 */
class DoctorVisits extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notes'], 'default', 'value' => null],
            [['user_id', 'doctor_id', 'visit_date'], 'required'],
            [['user_id', 'doctor_id'], 'integer'],
            [['visit_date', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::class, 'targetAttribute' => ['doctor_id' => 'id']],
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
            'doctor_id' => 'Doctor ID',
            'visit_date' => 'Visit Date',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctors::class, ['id' => 'doctor_id']);
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
