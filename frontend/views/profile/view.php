<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Photo;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->firstname . " " . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

        <div class="panel panel-white profile-widget">
            <div class="row">
                <div class="col-sm-12">
                    <div class="image-container bg2">
                       <?php
                       echo Html::a(Html::img('../uploads/photo/'.$model->photo[0]['name'],
                        ['width'=>'200',
                        'class'=>'avatar',
                        ]),['photo/view/', 'id'=>$model->photo[0]['id']] );
                        ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="details">
                        <h4><?=$model->firstname . " " . $model->lastname?></h4>
                        <!-- <div>Works at Bootdey.com</div>
                        <div>Attended University of Bootdey.com</div>
                        <div>Bootdey Land</div> -->
                        <div class="mg-top-10">
                           <?php
                           if($model->user_id==Yii::$app->user->getId()){
                            echo Html::a(Yii::t('app', 'Update Profile'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']);
                            echo "   ";
                            echo Html::a(Yii::t('app', 'Delete Profile'), ['delete', 'id' => $model->user_id], [
                                'class' => 'btn btn-green',
                                'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                                ],
                                ]);
                        }else{
                         echo Html::a( Yii::t('app', 'Rate this foto'),
                            ['photo/view/', 'id'=>$model->photo[0]['id']],
                            ['class'=>'btn btn-info ']
                            );
                         echo " ";
                         echo Html::a( Yii::t('app', 'Send Message'),
                            ['messages/view/', 'id'=>$model->user_id],
                            ['class'=>'btn btn-success ']
                            );
                     }

                     ?>
                 </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-sm-6">

                <div class="panel panel-white border-top-purple">
                   <div class="panel-heading">
                        <h3 class="panel-title"><?=Yii::t('app','About me')?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','I\'m looking for')?></h5>
                            <p class="section-content"><?=$model->want_find?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading">Gender</h5>
                            <p class="section-content"><?=Yii::$app->params['gender'][$model->gender]?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Orientation')?></h5>
                            <p class="section-content"><?=Yii::$app->params['orientation'][$model->orientation]?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Purpose')?></h5>
                            <p class="section-content"><?=$model->purpose?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Children')?></h5>
                            <p class="section-content"><?=Yii::$app->params['has_children'][$model->has_children]?></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white border-top-light-blue">
                   <div class="panel-heading">
                        <h3 class="panel-title"><?=Yii::t('app','My Parameters')?></h3>
                    </div>
                    <div class="panel-body">
                       <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','My height')?></h5>
                            <p class="section-content"><?=$model->height?> cm</p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','My weight')?></h5>
                            <p class="section-content"><?=$model->weight?> kg</p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','My type of body')?></h5>
                            <p class="section-content"><?=Yii::$app->params['body'][$model->body]?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','My appearance')?></h5>
                            <p class="section-content"><?=Yii::$app->params['appearance'][$model->appearance]?></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white border-top-pink">
                   <div class="panel-heading">
                        <h3 class="panel-title"><?=Yii::t('app','My bad habbits')?></h3>
                    </div>
                    <div class="panel-body">
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Attitude to alcohol')?></h5>
                            <p class="section-content"><?=Yii::$app->params['alcohol'][$model->alcohol]?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Attitude to smoking')?></h5>
                            <p class="section-content"><?=Yii::$app->params['smoking'][$model->smoking]?></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6">

                <div class="panel panel-white border-top-green">
                   <div class="panel-heading">
                        <h3 class="panel-title"><?=Yii::t('app','User info')?></h3>
                    </div>
                    <div class="panel-body">
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Name')?></h5>
                            <p class="section-content"><?=$model->firstname?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Lastname')?></h5>
                            <p class="section-content"><?=$model->lastname?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Birthdate')?></h5>
                            <p class="section-content"><?=date('d-m-Y', $model->birthdate)?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Country')?></h5>
                            <p class="section-content"><?=$country->name?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Region')?></h5>
                            <p class="section-content"><?=$state->name?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','City')?></h5>
                            <p class="section-content"><?=$city->name?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Phone')?></h5>
                            <p class="section-content"><?=$model->phone?></p>
                        </div>
                          <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Education')?></h5>
                            <p class="section-content"><?=Yii::$app->params['education'][$model->education]?></p>
                        </div>
                        <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Relationships')?></h5>
                            <p class="section-content"><?=Yii::$app->params['relationships'][$model->relationships]?></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white border-top-orange">
                   <div class="panel-heading">
                        <h3 class="panel-title"><?=Yii::t('app','Additional info')?></h3>
                    </div>
                    <div class="panel-body">
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Languages')?></h5>
                            <p class="section-content"><?=Yii::$app->params['languages'][$model->languages]?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Habitation')?></h5>
                            <p class="section-content"><?=Yii::$app->params['habitation'][$model->habitation]?></p>
                        </div>
                         <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Interests')?></h5>
                            <p class="section-content"><?=$model->interests?></p>
                        </div>
                          <div class="body-section">
                            <h5 class="section-heading"><?=Yii::t('app','Religion')?></h5>
                            <p class="section-content"><?=Yii::$app->params['religion'][$model->religion]?></p>
                        </div>

                </div>
            </div>
        </div>

