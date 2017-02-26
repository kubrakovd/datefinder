<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\Typeahead;
use kartik\depdrop\DepDrop;
use yii\helpers\url;
use yii\widgets\LinkPager;
?>
<h1 class="text-center"><?=Yii::t('app', 'Search person by parameters') ?></h1>

<div class="panel">
    <div class="panel-body">
    	<?php
    	$form = ActiveForm::begin([
    		'method' => 'GET',
    		]);
    		?>
    		<div class="row">
    			<div class="col-sm-4">
    				<?= $form->field($model, 'gender')->dropDownlist(Yii::$app->params['gender'],['selected'=>'2'])->label(Yii::t('app','Gender'));?>
    			</div>
    			<!-- /.col-sm-4 -->
    			<div class="col-sm-4">
    				<?= $form->field($model, 'agemin')->textInput(['placeholder'=>'Please write the minimum age...', 'class'=>'form-control', 'value'=>isset($_GET['SearchForm']['agemin']) && $_GET['SearchForm']['agemin']?$_GET['SearchForm']['agemin']:''])->label(Yii::t('app','Minimum age'));?>
    			</div>
    			<!-- /.col-sm-4 -->
    			<div class="col-sm-4">
    				<?= $form->field($model, 'agemax')->textInput(['placeholder'=>'Please write the maximun age...', 'class'=>'form-control', 'value'=>isset($_GET['SearchForm']['agemax']) && $_GET['SearchForm']['agemax']?$_GET['SearchForm']['agemax']:''])->label(Yii::t('app','Maximum age'));?>
    			</div>
    			<!-- /.col-sm-4 -->
    		</div>
    		<!-- /.row -->

    		<div class="row">
    			<div class="col-sm-4">
    				<?=$form->field($model, 'country_id')->label(Yii::t('app','Country'))->dropDownlist($countries,[
							'prompt'=>Yii::t('app','Please select country'),
							]);
    				?>
    			</div>

    			<div class="col-sm-4">
    				<?=$form->field($model, 'region_id')->label(Yii::t('app','Region'))->widget(DepDrop::classname(), [
    					'options' => ['id'=>'region-id'],
    					'pluginOptions'=>[
    					'depends'=>['searchform-country_id'],
    					'placeholder' => Yii::t('app','Please select region'),
    					'url' => Url::to(['/site/getregions'])
    					]
    					]);?>
    				</div>
    				<div class="col-sm-4"><?=$form->field($model, 'city_id')->label(Yii::t('app','City'))->widget(DepDrop::classname(), [
    					'options' => ['id'=>'city-id'],
    					'pluginOptions'=>[
    					'depends'=>['region-id'],
    					'placeholder' => Yii::t('app','Please select city'),
    					'url' => Url::to(['/site/getcities'])
    					]
    					]);?>
    				</div>
			</div>
			<!-- /.row -->
			<div class="row">
    			<div class="col-sm-4">
    				<?= $form->field($model, 'relationships')->dropDownlist(Yii::$app->params['relationships'],['selected'=>'2'])->label(Yii::t('app','Relationships'));?>
    			</div>
    			<div class="col-sm-4">
    				<?= $form->field($model, 'orientation')->dropDownlist(Yii::$app->params['orientation'],['selected'=>'2'])->label(Yii::t('app','Orientation'));?>
    			</div>
    			<div class="col-sm-4">
    				<?= $form->field($model, 'has_children')->dropDownlist(Yii::$app->params['has_children'],['selected'=>'2'])->label(Yii::t('app','Children Status'));?>
    			</div>

    		</div>
			<!-- /.row -->

		<div class="row text-center">
			<div class="col-sm-6">
				<?= Html::submitButton(Yii::t('app','Go Search!'),['class'=>'btn btn-success btn-lg']);?>
			</div>
			<div class="col-sm-6">
				<?=Html::a(Yii::t('app','Refresh!'),['user/search/', 'id'=>Yii::$app->user->id], ['class'=>'btn btn-danger btn-lg'])?>
			</div>
		</div>
		<!-- /.row -->
		<?php
            ActiveForm::end();
            // echo "<pre>";
            // print_r($_GET);
            // echo "</pre>";
        ?>
    </div>
    <?php
    	if (isset($_GET['SearchForm'])) {
    	if (count($pag_groups)>0 ){
    		foreach ($pag_groups as $item) {
    	?>

    	<div class="panel panel-default">
    		<div class="panel-body">

    			<?=Html::a($item->firstname.' '.$item->lastname, ['profile/view', 'id'=>$item->user_id])?>
    		</div>
    	</div>
		<?php
		}
    	}else{
    	?>
	    	<div class="alert alert-info">
	    		<?=Yii::t('app', 'No people related to your search!' )?>
	    	</div>

    <?php
    	}
    	}
     ?>
</div>

<div class="text-center">
	<?php
		if (isset($_GET['SearchForm'])){
			echo LinkPager::widget(['pagination'=>$pagination]);
		}

	?>
</div>
