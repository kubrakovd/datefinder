<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property double $average_rate
 */
class Photo extends \yii\db\ActiveRecord
{
public $rating;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    // Пока не знаю где писать тут или в signup
    // public function beforeSave($insert){
    //     $this->user_id = Yii::$app->user->id;
    //     $this->average_rate = NULL;
    //     return parent::beforeSave($insert);
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [['user_id'], 'integer'],
            [['average_rate'], 'number'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'average_rate' => Yii::t('app', 'Average Rate'),
        ];
    }

    public function getProfile(){
        return $this->hasOne(Profile::classname(), ['user_id'=>'user_id']);
    }

}
