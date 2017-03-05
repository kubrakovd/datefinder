<?php

namespace frontend\controllers;

use Yii;
use common\models\Photo;
use common\models\PhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Rating;
use common\models\Profile;
use frontend\models\RatingForm;
use yii\helpers\ArrayHelper;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionTop($id)
    {
        $topphotos = Photo::find()->orderBy('average_rate DESC')->all();
        for($i=0;$i<5;$i++){
            $profile[] = Profile::find()->where(['user_id'=>$topphotos[$i]['user_id']])->all();
        }
        return $this->render('top', [
            'topphotos' => $topphotos,
            'profile' => $profile,
        ]);
    }

    /**
     * Displays a single Photo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $ratemodel = new Rating;
        $rate_old = Rating::find()->where(['from_user'=>Yii::$app->user->id, 'photo_id'=>$id])->all();

        $new_rate = [];
        if(isset($_POST['Photo']['rating']) && count($rate_old)==0){
            $ratemodel->photo_id = $id;
            $ratemodel->to_user = $this->findModel($id)['user_id'];
            $ratemodel->from_user = Yii::$app->user->id;
            $ratemodel->rate = (float)$_POST['Photo']['rating'];
            $ratemodel->date_created = (string)time();
            $ratemodel->save();
        }if(isset($_POST['Photo']['rating'])){
            $new_rate = Rating::find()->where(['from_user'=>Yii::$app->user->id,'photo_id'=>$id])->one();
            $new_rate->rate = (float)$_POST['Photo']['rating'];
            $new_rate->date_created = (string)time();
            $new_rate->update();
        }
        $update_average_rate = Rating::find()->where(['photo_id'=>$id])->asArray()->all();
        $uarmap = ArrayHelper::map($update_average_rate, 'id', 'rate');
        $uarsum = array_sum($uarmap);
        $uarcount = count($uarmap);
        if($uarcount>0){
            $new_average_rate = $uarsum/$uarcount;
            $find_photo = Photo::find()->where(['id'=>$id])->one();
            $find_photo->average_rate = $new_average_rate;
            $find_photo->update();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'ratemodel' =>$ratemodel,
            'rate_old' => $rate_old,
        ]);
    }

    /**
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Photo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
