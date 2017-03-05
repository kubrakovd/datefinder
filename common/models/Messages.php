<?php

namespace common\models;

use Yii;
use common\models\User;


/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $from_user
 * @property integer $to_user
 * @property string $message
 * @property string $date_created
 * @property integer $viewed
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    // public function beforeSave($insert){
    //     echo "<pre>";
    //     print_r(Yii::$app->user->identity);
    //     echo "</pre>";
    //     $message->from_user = Yii::$app->user->id;
    //     $message->date_created = time();
    //     $message->viewed = '0';
    //     return parent::beforeSave($insert);
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_user', 'to_user', 'message', 'date_created', 'viewed'], 'required'],
            [['from_user', 'to_user', 'viewed'], 'integer'],
            [['message'], 'string'],
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
            'from_user' => Yii::t('app', 'From User'),
            'to_user' => Yii::t('app', 'To User'),
            'message' => Yii::t('app', 'Message'),
            'date_created' => Yii::t('app', 'Date Created'),
            'viewed' => Yii::t('app', 'Viewed'),
        ];
    }

    public function getSender(){
        return $this->hasOne(User::className(), ['id'=>'from_user']);
    }

    public function getReceiver(){
        return $this->hasOne(User::className(), ['id'=>'to_user']);
    }
}
