<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'birthdate') ?>

    <?= $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'want_find') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'purpose') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'appearance') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'languages') ?>

    <?php // echo $form->field($model, 'has_children') ?>

    <?php // echo $form->field($model, 'orientation') ?>

    <?php // echo $form->field($model, 'smoking') ?>

    <?php // echo $form->field($model, 'alcohol') ?>

    <?php // echo $form->field($model, 'habitation') ?>

    <?php // echo $form->field($model, 'interests') ?>

    <?php // echo $form->field($model, 'relationships') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
