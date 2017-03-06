<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-12">

               <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

                <!-- /.first_step -->

                    <div class="row">
                        <div class="col-md-3">
                      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'firstname')->textInput() ?>
                            <?= $form->field($model, 'lastname')->textInput() ?>
                           <?php
                           // echo $form->field($model, 'birthdate')->textInput();
                            echo 'Birth Date';
                            echo DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'birthdate',
                                    'type' => DatePicker::TYPE_INPUT,
                                     'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'dd-M-yyyy'
                                ],
                            ]);
                            ?>
                            <?= $form->field($model, 'country_id')->dropDownlist($countries) ?>
                            <?php
                                echo $form->field($model, 'region_id')->widget(DepDrop::classname(), [
                               'options' => ['id'=>'region-id',
                               '2'=>['selected'=>true]
                               ],
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
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <?= $form->field($model, 'gender')->dropDownlist(Yii::$app->params['gender']) ?>
                            <?= $form->field($model, 'want_find')->textInput(['value'=>'test']) ?>
                            <?= $form->field($model, 'phone')->textInput(['value'=>'123']) ?>
                            <?= $form->field($model, 'purpose')->textInput(['value'=>'test find']) ?>
                            <?= $form->field($model, 'height')->textInput(['value'=>'170']) ?>
                            <?= $form->field($model, 'weight')->textInput(['value'=>'70']) ?>
                            <?= $form->field($model, 'body')->dropDownlist(Yii::$app->params['body']) ?>
                            <?= $form->field($model, 'appearance')->dropDownlist(Yii::$app->params['appearance'])  ?>
                            <?= $form->field($model, 'education')->dropDownlist(Yii::$app->params['education'])  ?>

                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <?= $form->field($model, 'languages')->dropDownlist(Yii::$app->params['languages'])  ?>
                            <?= $form->field($model, 'smoking')->dropDownlist(Yii::$app->params['smoking'])  ?>
                            <?= $form->field($model, 'alcohol')->dropDownlist(Yii::$app->params['alcohol'])  ?>
                            <?= $form->field($model, 'interests')->textInput(['value'=>'all']) ?>
                            <?= $form->field($model, 'relationships')->dropDownlist(Yii::$app->params['relationships']) ?>
                            <?= $form->field($model, 'religion')->dropDownlist(Yii::$app->params['religion']) ?>
                           <?= $form->field($model, 'has_children')->dropDownlist(Yii::$app->params['has_children'])  ?>
                            <?= $form->field($model, 'habitation')->dropDownlist(Yii::$app->params['habitation'])  ?>
                            <?= $form->field($model, 'orientation')->dropDownlist(Yii::$app->params['orientation']) ?>
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <?php
                              echo $form->field($model, 'photo[]')->widget(FileInput::classname(), [
                                'options' => [
                                    'multiple' => true,
                                    'accept' => 'image/*',
                                ],
                                ]);
                                ?>
                            </div>
                        <!-- /.col-md-3 -->
                    </div>


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
