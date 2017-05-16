<?php
namespace frontend\modules\plktest\controllers;
use yii\web\Controller;

class ReportController extends Controller{
    public function actionNcd(){
        
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

