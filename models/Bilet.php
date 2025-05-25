<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bilet".
 *
 * @property int $id
 * @property int $user_id
 * @property int $spektakl_id
 * @property string $title
 *
 * @property InfoBilet[] $infoBilets
 * @property Spektakl $spektakl
 * @property User $user
 */
class Bilet extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bilet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'spektakl_id', 'title'], 'required'],
            [['user_id', 'spektakl_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['spektakl_id'], 'exist', 'skipOnError' => true, 'targetClass' => Spektakl::class, 'targetAttribute' => ['spektakl_id' => 'id']],
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
            'spektakl_id' => 'Spektakl ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[InfoBilets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfoBilets()
    {
        return $this->hasMany(InfoBilet::class, ['bilet_id' => 'id']);
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
