<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Sellers;

/**
 * SellersSearch represents the model behind the search form about `frontend\models\Sellers`.
 */
class SellersSearch extends Sellers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sel_id'], 'integer'],
            [['sel_name', 'sel_tel', 'sel_town'], 'safe'],
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
        $query = Sellers::find();

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
            'sel_id' => $this->sel_id,
        ]);

        $query->andFilterWhere(['like', 'sel_name', $this->sel_name])
            ->andFilterWhere(['like', 'sel_tel', $this->sel_tel])
            ->andFilterWhere(['like', 'sel_town', $this->sel_town]);

        return $dataProvider;
    }
}
