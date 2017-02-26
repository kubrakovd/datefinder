<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] =['label' => Yii::t('app', 'All Profiles'), 'url' => ['profile/index']];
        $menuItems[] =['label' => Yii::t('app','My Profile'), 'url' => ['/profile/view', 'id'=>Yii::$app->user->id]];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?php
            if(!Yii::$app->user->isGuest){
            ?>
            <div class="row">

            <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li  class="active"><?=Html::a(Yii::t('app','My Profile'),['profile/view/', 'id'=>Yii::$app->user->id])?></li>
               <li ><?=Html::a(Yii::t('app','Search person'),['user/search/', 'id'=>Yii::$app->user->id])?></li>
               <li ><?=Html::a(Yii::t('app','Top Profiles'),['user/top/', 'id'=>Yii::$app->user->id])?></li>
                <hr>
                <li ><?=Html::a(Yii::t('app','Rank random foto'),['photos/random/', 'id'=>Yii::$app->user->id])?></li>
                <li ><?=Html::a(Yii::t('app','My photos'),['photos/index/', 'id'=>Yii::$app->user->id])?></li>
              </ul>
          </div>
            <!-- /.col-md-3 -->
            <div class="col-md-9">
                <?=$content ?>
            </div>
            <!-- /.col-md-12 -->
        <?php
            }else{
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo $content;
                echo '</div>';
                // <!-- /.col-md-5 -->
            }
         ?>
        </div>
        <!-- /.row -->
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=Yii::$app->name ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered()?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
