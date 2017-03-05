<?php

namespace frontend\controllers;
use Yii;
use frontend\models\RatingForm;

class RatingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


}
