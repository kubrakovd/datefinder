<?php

namespace common\models;

use Yii;
use common\models\Photo;
use common\models\User;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $photo_id
 * @property integer $from_user
 * @property integer $to_user
 * @property double $rate
 * @property string $date_created
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id', 'from_user', 'to_user', 'rate', 'date_created'], 'required'],
            [['photo_id', 'from_user', 'to_user'], 'integer'],
            [['rate'], 'number'],
            [['date_created'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'photo_id' => Yii::t('app', 'Photo ID'),
            'from_user' => Yii::t('app', 'From User'),
            'to_user' => Yii::t('app', 'To User'),
            'rate' => Yii::t('app', 'Rate'),
            'date_created' => Yii::t('app', 'Date Created'),
        ];
    }

    public function getRatesender(){
        return $this->hasOne(User::classname(), ['id'=>'from_user']);
    }

    public function getRatereceiver(){
        return $this->hasOne(User::classname(), ['id'=>'to_user']);
    }

     public function getPhoto(){
        return $this->hasOne(Photo::classname(), ['id'=>'photo_id']);
    }
}
