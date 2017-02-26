<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'firstname',
            'lastname',
            [
                'label'=>Yii::t('app','Birthdate'),
                'value' => date('d-m-Y', $model->birthdate)
            ],
            'country_id' => [
                'label' => Yii::t('app','Country'),
                'value' => $country->name
            ],
             'state id' => [
                'label' => Yii::t('app','State'),
                'value' => $state->name
            ],
             'city_id' => [
                'label' => Yii::t('app','City'),
                'value' => $city->name
            ],
            [
                'label'=>Yii::t('app','Gender'),
                'value' =>Yii::$app->params['gender'][$model->gender]
            ],
            'want_find',
            'phone',
            'purpose',
            'height',
            'weight',
            [
                'label'=>Yii::t('app','Body'),
                'value' =>Yii::$app->params['body'][$model->body]
            ],
            [
                'label'=>Yii::t('app','Appearance'),
                'value' =>Yii::$app->params['appearance'][$model->appearance]
            ],
            [
                'label'=>Yii::t('app','Education'),
                'value' =>Yii::$app->params['education'][$model->education]
            ],
             [
                'label'=>Yii::t('app','Languages'),
                'value' =>Yii::$app->params['languages'][$model->languages]
            ],
             [
                'label'=>Yii::t('app','Has children'),
                'value' =>Yii::$app->params['has_children'][$model->has_children]
            ],
             [
                'label'=>Yii::t('app','Orientation'),
                'value' =>Yii::$app->params['orientation'][$model->orientation]
            ],
             [
                'label'=>Yii::t('app','Smoking'),
                'value' =>Yii::$app->params['smoking'][$model->smoking]
            ],
             [
                'label'=>Yii::t('app','Alcohol'),
                'value' =>Yii::$app->params['alcohol'][$model->alcohol]
            ],
             [
                'label'=>Yii::t('app','Habitation'),
                'value' =>Yii::$app->params['habitation'][$model->habitation]
            ],
            'interests',
             [
                'label'=>Yii::t('app','Relationships'),
                'value' =>Yii::$app->params['relationships'][$model->relationships]
            ],
             [
                'label'=>Yii::t('app','Religion'),
                'value' =>Yii::$app->params['religion'][$model->religion]
            ],
        ],
    ]) ?>

</div>
