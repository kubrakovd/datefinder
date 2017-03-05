<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\StarRating;
use yii\widgets\ActiveForm;
use common\models\Profile;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

?>
<div class="row">

    <br>
    <h1 class="text-center">Top rated photo:</h1>
     <h2 class="text-center"><?=$profile[0][0]['firstname'] . ' ' . $profile[0][0]['lastname']?></h2>
      <p class="text-center">Rate of this photo: <strong><?=$topphotos[0]['average_rate']?> </strong></p>
    <?php
        echo '<div class="col-md-4">';
         echo Html::a(Html::img('../../uploads/photo/'.$topphotos[0]['name'],
              ['class' => 'top-photo',
                    ]),['photo/view/', 'id'=>$topphotos[0]['id']] );
        echo '</div>';
     ?>
</div>
<!-- /.row -->
<section class="slider">
  <div class="row">
        <h1 class="text-center">Photos in top 5:</h1>
        <div id="carousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to='0'></li>
            <li data-target="#carousel" data-slide-to='1'></li>
            <li data-target="#carousel" data-slide-to='2'></li>
            <li data-target="#carousel" data-slide-to='3'></li>
          </ol>
          <!-- /.carousel-indicators-->
          <div class="text-center">
            <div class="carousel-inner">
               <div class="item active slide">
                 <?php
                 echo Html::a(Html::img('../../uploads/photo/'.$topphotos[1]['name'],
                   [
                   ]),['photo/view/', 'id'=>$topphotos[1]['id']] );
                   ?>
                   <div class="carousel-caption slider-text">
                   </div>
                     <h2 ><?=$profile[1][0]['firstname'] . ' ' . $profile[1][0]['lastname']?></h2>
                     <p>Rate of this photo: <strong><?=$topphotos[1]['average_rate']?></strong></p>
                 </div>

                 <div class="item slide">
                   <?php
                   echo Html::a(Html::img('../../uploads/photo/'.$topphotos[2]['name'],
                     [
                     ]),['photo/view/', 'id'=>$topphotos[2]['id']] );
                     ?>
                     <div class="carousel-caption slider-text">
                     </div>
                       <h2 ><?=$profile[2][0]['firstname'] . ' ' . $profile[2][0]['lastname']?></h2>
                       <p>Rate of this photo: <strong><?=$topphotos[2]['average_rate']?></strong></p>
                   </div>
                    <div class="item slide">
                     <?php
                     echo Html::a(Html::img('../../uploads/photo/'.$topphotos[3]['name'],
                      [
                       ]),['photo/view/', 'id'=>$topphotos[3]['id']] );
                       ?>
                       <div class="carousel-caption slider-text">
                       </div>
                         <h2 ><?=$profile[3][0]['firstname'] . ' ' . $profile[3][0]['lastname']?></h2>
                         <p>Rate of this photo: <strong><?=$topphotos[3]['average_rate']?></strong></p>
                     </div>
                      <div class="item slide">
                 <?php
                 echo Html::a(Html::img('../../uploads/photo/'.$topphotos[4]['name'],
                   [
                   ]),['photo/view/', 'id'=>$topphotos[4]['id']] );
                   ?>
                   <div class="carousel-caption slider-text">
                   </div>
                     <h2 ><?=$profile[4][0]['firstname'] . ' ' . $profile[4][0]['lastname']?></h2>
                     <p>Rate of this photo: <strong><?=$topphotos[4]['average_rate']?></strong></p>
                 </div>

                 </div>
                 <!-- /.carousel-inner -->
               </div>
               <!-- /.text-center -->
       <a href="#carousel" class="left carousel-control" data-slide='prev'>
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a href="#carousel" class="right carousel-control" data-slide='next'>
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      <!-- /slider arrows -->
    </div>
    <!-- /#carousel .carousel .slide -->
  </div>
  <!-- /.row -->
</section>
<!-- /.slider -->
