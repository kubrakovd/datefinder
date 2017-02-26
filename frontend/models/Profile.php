<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $birthdate
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $gender
 * @property string $want_find
 * @property string $phone
 * @property string $purpose
 * @property string $height
 * @property string $weight
 * @property integer $body
 * @property integer $appearance
 * @property integer $education
 * @property integer $languages
 * @property integer $has_children
 * @property integer $orientation
 * @property integer $smoking
 * @property integer $alcohol
 * @property integer $habitation
 * @property string $interests
 * @property integer $relationships
 * @property integer $religion
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

     public function beforeSave($insert){
        $this->birthdate = strtotime($this->birthdate);
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'birthdate', 'country_id', 'region_id', 'city_id', 'gender', 'want_find', 'phone', 'purpose', 'height', 'weight', 'body', 'appearance', 'education', 'languages', 'has_children', 'orientation', 'smoking', 'alcohol', 'habitation', 'interests', 'relationships', 'religion'], 'required'],
            // [['user_id', 'gender', 'body', 'appearance', 'education',  'has_children', 'orientation', 'smoking', 'alcohol', 'habitation', 'relationships', 'religion'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
            [['birthdate'], 'string', 'max' => 12],
            [['want_find', 'purpose', 'interests'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 25],
            [['height', 'weight'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'country_id' => Yii::t('app', 'Country ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'gender' => Yii::t('app', 'Gender'),
            'want_find' => Yii::t('app', 'Want Find'),
            'phone' => Yii::t('app', 'Phone'),
            'purpose' => Yii::t('app', 'Purpose'),
            'height' => Yii::t('app', 'Height'),
            'weight' => Yii::t('app', 'Weight'),
            'body' => Yii::t('app', 'Body'),
            'appearance' => Yii::t('app', 'Appearance'),
            'education' => Yii::t('app', 'Education'),
            'languages' => Yii::t('app', 'Languages'),
            'has_children' => Yii::t('app', 'Has Children'),
            'orientation' => Yii::t('app', 'Orientation'),
            'smoking' => Yii::t('app', 'Smoking'),
            'alcohol' => Yii::t('app', 'Alcohol'),
            'habitation' => Yii::t('app', 'Habitation'),
            'interests' => Yii::t('app', 'Interests'),
            'relationships' => Yii::t('app', 'Relationships'),
            'religion' => Yii::t('app', 'Religion'),
        ];
    }
}
