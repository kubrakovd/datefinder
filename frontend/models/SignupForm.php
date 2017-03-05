<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Photo;
use frontend\controllers\PhotoController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use persianyii\image\Resize;

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
    public $orientation;
    public $habitation;
    public $interests;
    public $relationships;
    public $religion;
    public $photo;


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
            [['firstname','lastname','birthdate','country_id','region_id','city_id','gender','want_find','phone','purpose','height','weight','body','appearance','education','languages','has_children','smoking','alcohol','habitation','orientation','relationships','interests','religion',
            'photo'
            ],'required'],



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
        echo "<pre>";
        // print_r($_FILES);
        // print_r($_POST);
        // var_dump($_POST);
        echo "</pre>";
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();
        // return $user;

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->firstname = $this->firstname;
        $profile->lastname = $this->lastname;
        $profile->birthdate = strtotime($this->birthdate);
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
        $profile->orientation = $this->orientation;
        $profile->habitation = $this->habitation;
        $profile->interests = $this->interests;
        $profile->relationships = $this->relationships;
        $profile->religion = $this->religion;

        $profile->save();


        if(!empty($_FILES)){
            $photo_array = $_FILES['SignupForm']['type']['photo'];
            $i = 0;
            foreach ($photo_array as $photo_item) {
                switch ($photo_item) {
                    case 'image/jpeg':
                        $ext = 'jpg';
                        break;
                    case 'image/jpg':
                        $ext = 'jpg';
                        break;
                    case 'image/png':
                        $ext = 'png';
                        break;
                    case 'image/gif':
                        $ext = 'gif';
                        break;
                }
            $photoname = md5($photo_item.time()). '.' . $ext;
            $photo_temp = $_FILES['SignupForm']['tmp_name']['photo'];
            $photo = new Photo();
            switch ($i) {
                case '0':
                    $save = move_uploaded_file($photo_temp[0], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                break;
                case '1':
                      $save = move_uploaded_file($photo_temp[1], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                break;
                case '2':
                      $save = move_uploaded_file($photo_temp[2], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                break;
                case '3':
                      $save = move_uploaded_file($photo_temp[3], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                break;
                case '4':
                      $save = move_uploaded_file($photo_temp[4], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                break;
                case '5':
                      $save = move_uploaded_file($photo_temp[5], $_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
                 break;
            }
            $resize = new Resize($_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);
            $resize->resizeTo(500, 500);
            $resize->saveImage($_SERVER['DOCUMENT_ROOT']. '/datefinder/frontend/web/uploads/photo/'.$photoname);

            $photo->user_id = $user->id;
            $photo->name = $photoname;
            $photo->save();
            $i++;

            }
        }
        if($profile->save()
            && $photo->save()
            ){
            return $user;
        }else{
            $user->delete();
            $profile->delete();
            $photo->delete();
            return null;
        }
    }
}
