<?php
namespace frontend\modules\plktest\controllers;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

class ReportController extends Controller{
    public function actionNcd($date1=NULL,$date2=NULL){
        
        $sql = " select * from t_chronic";//1
        
        if(!empty($date1) and !empty($date2)){
        $sql.=" where date_dx between '$date1' and '$date2'";
        }
        
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();//2
        
        $dataProvider = new ArrayDataProvider([//3
            'allModels'=>$raw
        ]);
        
        return $this->render('ncd',[ //4
            'dataProvider'=>$dataProvider,
            'date1'=>$date1,
            'date2'=>$date2
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

