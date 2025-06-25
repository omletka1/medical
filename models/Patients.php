<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patients".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $birth_date
 * @property string $gender
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $insurance_number
 * @property string|null $medical_history
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DoctorVisits[] $doctorVisits
 * @property LabResults[] $labResults
 * @property MedicationLogs[] $medicationLogs
 * @property Procedures[] $procedures
 */
class Patients extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patronymic', 'address', 'phone', 'email', 'insurance_number', 'medical_history'], 'default', 'value' => null],
            [['surname', 'name', 'birth_date', 'gender'], 'required'],
            [['birth_date', 'created_at', 'updated_at'], 'safe'],
            [['gender', 'address', 'medical_history'], 'string'],
            [['surname', 'name', 'patronymic', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['insurance_number'], 'string', 'max' => 50],
            ['gender', 'in', 'range' => array_keys(self::optsGender())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'insurance_number' => 'Insurance Number',
            'medical_history' => 'Medical History',
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
        return $this->hasMany(DoctorVisits::class, ['patient_id' => 'id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResults::class, ['patient_id' => 'id']);
    }

    /**
     * Gets query for [[MedicationLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicationLogs()
    {
        return $this->hasMany(MedicationLogs::class, ['patient_id' => 'id']);
    }

    /**
     * Gets query for [[Procedures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcedures()
    {
        return $this->hasMany(Procedures::class, ['patient_id' => 'id']);
    }


    /**
     * column gender ENUM value labels
     * @return string[]
     */
    public static function optsGender()
    {
        return [
            self::GENDER_MALE => 'male',
            self::GENDER_FEMALE => 'female',
        ];
    }

    /**
     * @return string
     */
    public function displayGender()
    {
        return self::optsGender()[$this->gender];
    }

    /**
     * @return bool
     */
    public function isGenderMale()
    {
        return $this->gender === self::GENDER_MALE;
    }

    public function setGenderToMale()
    {
        $this->gender = self::GENDER_MALE;
    }

    /**
     * @return bool
     */
    public function isGenderFemale()
    {
        return $this->gender === self::GENDER_FEMALE;
    }

    public function setGenderToFemale()
    {
        $this->gender = self::GENDER_FEMALE;
    }
}
