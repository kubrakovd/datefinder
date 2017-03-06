<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Profile;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">



    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php
        echo 'Birth Date';
        echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'birthdate',
                'type' => DatePicker::TYPE_INPUT,
                 'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-M-yyyy'
            ],
            'options'=>[
                'value' => date('d-m-Y',$model->birthdate),
            ]
        ]);
        ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownlist(Yii::$app->params['gender']) ?>

    <?= $form->field($model, 'want_find')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->dropDownlist(Yii::$app->params['body']) ?>

    <?= $form->field($model, 'appearance')->dropDownlist(Yii::$app->params['appearance'])?>

    <?= $form->field($model, 'education')->dropDownlist(Yii::$app->params['education'])?>

    <?= $form->field($model, 'languages')->dropDownlist(Yii::$app->params['languages']
    // ,['multiple'=>'multiple']
        )
    ?>

    <?= $form->field($model, 'has_children')->dropDownlist(Yii::$app->params['has_children']) ?>

    <?= $form->field($model, 'orientation')->dropDownlist(Yii::$app->params['orientation']) ?>

    <?= $form->field($model, 'smoking')->dropDownlist(Yii::$app->params['smoking']) ?>

    <?= $form->field($model, 'alcohol')->dropDownlist(Yii::$app->params['alcohol']) ?>

    <?= $form->field($model, 'habitation')->dropDownlist(Yii::$app->params['habitation'])?>

    <?= $form->field($model, 'interests')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationships')->dropDownlist(Yii::$app->params['relationships']) ?>

    <?= $form->field($model, 'religion')->dropDownlist(Yii::$app->params['religion']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
