<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <!-- /.first_step -->

                    <div class="row">
                        <div class="col-md-6">
                      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'firstname')->textInput() ?>
                            <?= $form->field($model, 'lastname')->textInput() ?>
                            <?= $form->field($model, 'birthdate')->textInput() ?>
                            <?= $form->field($model, 'country_id')->dropDownlist($countries) ?>
                            <?php
                                echo $form->field($model, 'region_id')->widget(DepDrop::classname(), [
                               'options' => ['id'=>'region-id'],
                               'pluginOptions'=>[
                               'depends'=>['signupform-country_id'],
                               'placeholder' => 'Select region...',
                               'url' => Url::to(['/site/getregions'])
                               ]
                               ]);
                            ?>
                            <?php
                                echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                               'options' => ['id'=>'city-id'],
                               'pluginOptions'=>[
                               'depends'=>['region-id'],
                               'placeholder' => 'Select city...',
                               'url' => Url::to(['/site/getcities'])
                               ]
                               ]);
                            ?>
                           <?= $form->field($model, 'gender')->dropDownlist(Yii::$app->params['gender']) ?>
                            <?= $form->field($model, 'want_find')->textInput() ?>
                            <?= $form->field($model, 'phone')->textInput() ?>
                            <?= $form->field($model, 'purpose')->textInput() ?>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <?= $form->field($model, 'height')->textInput() ?>
                            <?= $form->field($model, 'weight')->textInput() ?>
                            <?= $form->field($model, 'body')->dropDownlist(Yii::$app->params['body']) ?>
                            <?= $form->field($model, 'appearance')->dropDownlist(Yii::$app->params['appearance'])  ?>
                            <?= $form->field($model, 'education')->dropDownlist(Yii::$app->params['education'])  ?>
                            <?= $form->field($model, 'languages')->dropDownlist(Yii::$app->params['languages'])  ?>
                            <?= $form->field($model, 'has_children')->dropDownlist(Yii::$app->params['has_children'])  ?>
                            <?= $form->field($model, 'smoking')->dropDownlist(Yii::$app->params['smoking'])  ?>
                            <?= $form->field($model, 'alcohol')->dropDownlist(Yii::$app->params['alcohol'])  ?>
                            <?= $form->field($model, 'habitation')->dropDownlist(Yii::$app->params['habitation'])  ?>
                            <?= $form->field($model, 'interests')->textInput() ?>
                            <?= $form->field($model, 'relationships')->dropDownlist(Yii::$app->params['relationships']) ?>
                            <?= $form->field($model, 'religion')->dropDownlist(Yii::$app->params['religion']) ?>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
