<?php

namespace frontend\modules\report\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;

/**
 * Default controller for the `report` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionReport1($date1=null,$date2=null){
        
        $sql = "select cid,pname,fname,lname,birthdate from person";
        if(!empty($date1) && !empty($date2)){
            $sql.= " where birthdate between '$date1' and '$date2'";
        }else{
            $sql.=' limit 0';
        }
        
        $raw = \Yii::$app->db_hos->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$raw
        ]);
        return $this->render('report1',[
            'dataProvider'=>$dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            'sql'=>$sql
        ]);
    }
}
