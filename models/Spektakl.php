<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spektakl".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $status
 *
 * @property Bilet[] $bilets
 * @property Bilet[] $bilets0
 * @property InfoBilet[] $infoBilets
 */
class Spektakl extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spektakl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start_date', 'status'], 'required'],
            [['start_date'], 'safe'],
            [['title', 'description', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Bilets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilets()
    {
        return $this->hasMany(Bilet::class, ['spektakl_id' => 'id']);
    }

    /**
     * Gets query for [[Bilets0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilets0()
    {
        return $this->hasMany(Bilet::class, ['title' => 'title']);
    }

    /**
     * Gets query for [[InfoBilets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfoBilets()
    {
        return $this->hasMany(InfoBilet::class, ['spektakl_id' => 'id']);
    }

}
