<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'country_id', 'region_id', 'city_id', 'gender', 'body', 'appearance', 'education', 'has_children', 'orientation', 'smoking', 'alcohol', 'habitation', 'relationships', 'religion'], 'integer'],
            [['firstname', 'lastname', 'birthdate', 'want_find', 'phone', 'purpose', 'height', 'weight', 'languages', 'interests'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Profile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'gender' => $this->gender,
            'body' => $this->body,
            'appearance' => $this->appearance,
            'education' => $this->education,
            'has_children' => $this->has_children,
            'orientation' => $this->orientation,
            'smoking' => $this->smoking,
            'alcohol' => $this->alcohol,
            'habitation' => $this->habitation,
            'relationships' => $this->relationships,
            'religion' => $this->religion,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'birthdate', $this->birthdate])
            ->andFilterWhere(['like', 'want_find', $this->want_find])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'languages', $this->languages])
            ->andFilterWhere(['like', 'interests', $this->interests]);

        return $dataProvider;
    }
}
