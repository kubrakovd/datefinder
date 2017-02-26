<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Profile'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'firstname',
            'lastname',
            // 'birthdate',
            'country_id',
            // 'region_id',
            // 'city_id',
            'gender',

            // 'want_find',
            // 'phone',
            // 'purpose',
            // 'height',
            // 'weight',
            // 'body',
            // 'appearance',
            // 'education',
            // 'languages',
            // 'has_children',
            // 'orientation',
            // 'smoking',
            // 'alcohol',
            // 'habitation',
            // 'interests',
            // 'relationships',
            // 'religion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
