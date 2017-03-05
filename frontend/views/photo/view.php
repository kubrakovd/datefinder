<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\StarRating;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="foto-view">
    <h2 class="text-center"><?='Photo of ' . $model->profile['firstname'] . " " . $model->profile['lastname']  ?></h2>
   <div class="col-sm-12 text-center">
      <?php  echo Html::a(Html::img('../uploads/photo/'.$model['name'],
       ['class'=>' text-center',
       'style'=>'border-radius: 20px; margin-top:40px;'
       ]),['profile/view/', 'id'=>$model['user_id']] );
       ?>
   </div>
</div>

<div class="photo-view">
    <p>
        <?php
            if($model->user_id==Yii::$app->user->getId()){
            echo "<br>";
            echo "<h2 class='text-center'>My profile foto</h2>";
        //     echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        //     echo " ";
        //     echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
        //         'method' => 'post',
        //     ],
        // ]);
        }else{
          $i = 0;
           $form = ActiveForm::begin();
           echo '<div class="text-center"';
           echo $form->field($model, 'rating')->label(Yii::t('app', 'Make your rate choise'))->widget(StarRating::classname(), [
            'pluginOptions' => ['step' => 0.5],
            ]);

           echo  Html::a(Html::submitButton(Yii::t('app', 'Rate this foto'),['class'=>'text btn btn-green']),['profile/view/', 'id'=>$model['user_id']] );
           echo '</div>';
           ActiveForm::end("Location:'profile/view/'");
           echo Html::a(Yii::t('app', 'Back to Profile'), ['profile/view', 'id' => $model->user_id], ['class' => 'btn btn-primary pull-right']);

       }

       // echo "<pre>";
       // // print_r($_POST['Photo']['rating']);
       // // print_r($new_rate);
       // echo "</pre>";
       ?>
        </div>
  <!-- /.foto-view -->




    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'user_id',
            // 'name',
            // 'average_rate',
        ],
    ]) ?>

</div>
