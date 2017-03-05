<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Photo',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
