<?php

namespace frontend\modules\dao\models;

use yii\base\Model;
use yii2mod\query\ArrayQuery;
use yii\data\ArrayDataProvider;

class RptSearch extends Model {

    public $val, $owner; 

    public function attributeLabels() {
        return [
            'val' => 'ข้อมูล',
            'owner' => 'เจ้าของ'
        ];
    }

    public function rules() {
        return [
            [['val','owner'], 'safe']
        ];
    }

    public function search($params = null) {
        $sql = "select d.val,d.owner owner_id,u.username owner from data d left join user u on u.id=d.owner";

        $models = \Yii::$app->db->createCommand($sql)->queryAll();
        $query = new ArrayQuery();
        $query->from($models);
        
        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'val', $this->val]);
            $query->andFilterWhere(['like', 'owner', $this->owner]);
            
           
        }
        
        
        $all_models = $query->all();        
        
        if (!empty($all_models[0])) {
            $cols = array_keys($all_models[0]);
        }

        return new ArrayDataProvider([
            'allModels' => $all_models,
            //'totalItems'=>100,
            'sort' => !empty($cols) ? ['attributes' => $cols] : FALSE,
            'pagination' => [
                'pageSize' => 25
            ]
        ]);
    }//search
}
