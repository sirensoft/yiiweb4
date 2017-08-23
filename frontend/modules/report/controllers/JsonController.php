<?php

namespace frontend\modules\report\controllers;
use yii\web\Controller;
use yii\helpers\Json;
use frontend\modules\report\models\Ampur;
use frontend\modules\report\models\Tambon;

class JsonController extends Controller
{
    public function actionGetamp() {
        
        $parents = \Yii::$app->request->post('depdrop_parents');
        if ($parents) {
            $prov_code = $parents[0];
            $out = Ampur::find()
                    ->select('ampurcodefull as id,ampurname as name')
                    ->where(['changwatcode' => $prov_code])
                    ->asArray()
                    ->all();
            return Json::encode(['output' => $out, 'selected' => '']);
        }
    }
    public function actionGettmb() {
        $parents = \Yii::$app->request->post('depdrop_parents');
        if ($parents) {
            $amp_code = $parents[0];
            $out = Tambon::find()
                    ->select('tamboncodefull as id,tambonname as name')
                    ->where(['ampurcode' => $amp_code])
                    ->asArray()
                    ->all();
            return Json::encode(['output' => $out, 'selected' => '']);
        }
    }
    
    public function actionTambon(){
        
        $sql = "select * from gis_tambon";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $json =[];
        
        foreach ($raw as $val) {
            $json[]=[
                'type'=>'Feature',
                'properties'=>[
                    'fill'=>'lime'
                ],
                
                'geometry'=>[
                    'type'=> 'MultiPolygon',
                    'coordinates'=> json_decode($val['COORDINATES'])
                ]
            ];
        }
        
        return json_encode($json);
        
    }
}
