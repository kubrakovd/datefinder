<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $birthdate;
    public $country_id;
    public $region_id;
    public $city_id;
    public $gender;
    public $want_find;
    public $phone;
    public $purpose;
    public $height;
    public $weight;
    public $body;
    public $appearance;
    public $education;
    public $languages;
    public $has_children;
    public $smoking;
    public $alcohol;
    public $habitation;
    public $interests;
    public $relationships;
    public $religion;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['firstname','lastname','birthdate','country_id','region_id','city_id','want_find','height','weight',],'required'],
            [['phone','purpose','appearance','interests'],'string'],
            [['gender','education','body','languages','has_children','smoking','alcohol','habitation','relationships','religion'],'integer'],


            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->firstname = $this->firstname;
        $profile->lastname = $this->lastname;
        $profile->birthdate = $this->birthdate;
        $profile->country_id = $this->country_id;
        $profile->region_id = $this->region_id;
        $profile->city_id = $this->city_id;
        $profile->gender = $this->gender;
        $profile->want_find = $this->want_find;
        $profile->phone = $this->phone;
        $profile->purpose = $this->purpose;
        $profile->height = $this->height;
        $profile->weight = $this->weight;
        $profile->body = $this->body;
        $profile->appearance = $this->appearance;
        $profile->education = $this->education;
        $profile->languages = $this->languages;
        $profile->has_children = $this->has_children;
        $profile->smoking = $this->smoking;
        $profile->alcohol = $this->alcohol;
        $profile->habitation = $this->habitation;
        $profile->interests = $this->interests;
        $profile->relationships = $this->relationships;
        $profile->religion = $this->religion;

        $profile->save();

        if($profile->save(false)){
            return $user;
        }else{
            $user->delete();
            return null;
        }
    }
}
