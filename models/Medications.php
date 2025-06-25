<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medications".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property MedicationLogs[] $medicationLogs
 */
class Medications extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[MedicationLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicationLogs()
    {
        return $this->hasMany(MedicationLogs::class, ['medication_id' => 'id']);
    }

}
