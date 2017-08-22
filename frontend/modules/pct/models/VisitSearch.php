<?php

namespace frontend\modules\pct\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pct\models\Visit;

/**
 * VisitSearch represents the model behind the search form about `frontend\modules\pct\models\Visit`.
 */
class VisitSearch extends Visit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid'], 'integer'],
            [['bp', 'note', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'safe'],
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
        $query = Visit::find();       

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
            'id' => $this->id,
            'pid' => $this->pid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bp', $this->bp])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
           

        return $dataProvider;
    }
}
