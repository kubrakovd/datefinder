<?php

namespace frontend\controllers;
use frontend\models\SearchForm;
use common\models\Profile;
use common\models\Countries;
use common\models\States;
use common\models\Cities;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
use yii\filters\VerbFilter;

class UserController extends \yii\web\Controller
{
    public function actionSearch()
    {
			$model = new SearchForm();
			$search = [];
			$current_time_uts = time();
			$query = '';

			$i=0;
	    	if(isset($_GET['SearchForm'])){
				$model->gender = $_GET['SearchForm']['gender'];
				$model->agemin = $_GET['SearchForm']['agemin'];
				$model->agemax = $_GET['SearchForm']['agemax'];
				$model->country_id = $_GET['SearchForm']['country_id'];
				if (isset($_GET['SearchForm']['region_id'])) {
					$model->region_id = $_GET['SearchForm']['region_id'];
					if(isset($_GET['SearchForm']['city_id'])){
						$model->city_id = $_GET['SearchForm']['city_id'];
					}
				}if (empty($_GET['SearchForm']['country_id'])) {
					$model->region_id = '';
					$model->city_id = '';
				}else{
				}
				$model->relationships = $_GET['SearchForm']['relationships'];
				$model->orientation = $_GET['SearchForm']['orientation'];
				$model->has_children = $_GET['SearchForm']['has_children'];
				foreach ($model as $key =>$item) {
					if(!empty($item)){
						switch ($key) {
							case 'agemin':
								$simbol = "<=";
								$item = $current_time_uts - $model->agemin*31622400;
								$key = 'birthdate';
								break;
							case 'agemax':
								$simbol = ">=";
								$item = (int)$current_time_uts - $model->agemax*31622400;
								$key = 'birthdate';
								break;
							default:
								$simbol = "=";
								break;
						}
						$query .= $i != 0 ? " AND " : "";
						$query .= "`$key`" . ' ' .$simbol. ' ' . "$item";
						$i++;
					}
				}
						// echo "<pre>";
						// echo "<hr>";
						// // print_r($item);
						// print_r($query);
						// echo "</pre>";
			}
		    	$countries = Countries::find()->all();
		    	$countries_array = ArrayHelper::map($countries, 'id','name');
		    	$search_count = count($search);
		    	$pag_query = Profile::find()->where($query);
		    	$pag_count = $pag_query->count();
		    	$pagination = new Pagination(['totalCount'=>$pag_count]);
		    	// $search = Profile::find()->where($query)->offset($pagination->offset)->limit($pagination->limit)->all();
		    	$pagination->defaultPageSize = 5;
		    	$pag_groups =$pag_query->offset($pagination->offset)
		    						->limit($pagination->limit)
                                    ->all();
		    	// echo "<pre>";
		    	// print_r($pagination);
		    	// echo "</pre>";
        return $this->render('search',[
        		'model'=> $model,
        		'countries' => $countries_array,
        		// 'search' => $search,
        		// 'query' => $query,
        		'pagination'=> $pagination,
        		'pag_groups' => $pag_groups
        		// 'search_count' => $search_count
        	]);
    }
}
