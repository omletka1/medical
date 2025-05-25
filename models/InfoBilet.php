<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info_bilet".
 *
 * @property int $id
 * @property int $spektakl_id
 * @property int $bilet_id
 * @property int $title
 * @property string $price
 *
 * @property Bilet $bilet
 * @property Spektakl $spektakl
 */
class InfoBilet extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info_bilet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spektakl_id', 'bilet_id', 'title', 'price'], 'required'],
            [['spektakl_id', 'bilet_id', 'title'], 'integer'],
            [['price'], 'string'],
            [['spektakl_id'], 'exist', 'skipOnError' => true, 'targetClass' => Spektakl::class, 'targetAttribute' => ['spektakl_id' => 'id']],
            [['bilet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bilet::class, 'targetAttribute' => ['bilet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spektakl_id' => 'Spektakl ID',
            'bilet_id' => 'Bilet ID',
            'title' => 'Title',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Bilet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilet()
    {
        return $this->hasOne(Bilet::class, ['id' => 'bilet_id']);
    }

    /**
     * Gets query for [[Spektakl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpektakl()
    {
        return $this->hasOne(Spektakl::class, ['id' => 'spektakl_id']);
    }

}
