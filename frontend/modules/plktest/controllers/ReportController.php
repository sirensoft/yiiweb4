<?php
namespace frontend\modules\plktest\controllers;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

class ReportController extends Controller{
    public function actionNcd(){
        
        $sql = " select * from t_chronic  limit 100";//1
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();//2
        
        $dataProvider = new ArrayDataProvider([//3
            'allModels'=>$raw
        ]);
        
        return $this->render('ncd',[ //4
            'dataProvider'=>$dataProvider
        ]);
        
    }    
    public function actionMom(){
        
    }
    public function actionKpiNcd(){
        $data = 'OK';
        return $this->render('kpi-ncd',[
            'data'=>$data,
            'data2'=>'ข้อมูล 2'
        ]);
    }
    
}

