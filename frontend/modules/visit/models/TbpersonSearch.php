<?php

namespace frontend\modules\visit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\visit\models\Tbperson;

/**
 * TbpersonSearch represents the model behind the search form about `frontend\modules\visit\models\Tbperson`.
 */
class TbpersonSearch extends Tbperson
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age_y'], 'integer'],
            [['prename', 'name', 'lname', 'birth', 'sex', 'addr', 'prov_code', 'amp_code', 'tmb_code', 'dischage_code', 'color', 'note'], 'safe'],
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
        $query = Tbperson::find();
        $query->joinWith('prov');

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
            'birth' => $this->birth,
            'age_y' => $this->age_y,
        ]);

        $query->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'addr', $this->addr])
            ->andFilterWhere(['like', 'c_province.changwatname', $this->prov_code])
            ->andFilterWhere(['like', 'amp_code', $this->amp_code])
            ->andFilterWhere(['like', 'tmb_code', $this->tmb_code])
            ->andFilterWhere(['like', 'dischage_code', $this->dischage_code])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
