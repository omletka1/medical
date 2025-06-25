<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $specialization
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DoctorVisits[] $doctorVisits
 */
class Doctors extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['specialization', 'phone', 'email', 'address'], 'default', 'value' => null],
            [['first_name', 'last_name'], 'required'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'specialization', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'specialization' => 'Specialization',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[DoctorVisits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorVisits()
    {
        return $this->hasMany(DoctorVisits::class, ['doctor_id' => 'id']);
    }



}
