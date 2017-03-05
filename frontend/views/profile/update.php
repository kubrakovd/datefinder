<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

<?php if ($model->user_id==Yii::$app->user->getId()){
	?>
    <h1>Update my Profile</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	<?php
	} else{
		echo "<h1>You can`t update  profile of anotger person!</h1>";
	}
 ?>
</div>
