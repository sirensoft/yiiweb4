<?php

namespace frontend\modules\report\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use common\components\MyHelper;

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
        
        $sql = "select cid as 'เลขบัตร',pname,fname,lname,birthdate from person";
        if(!empty($date1) && !empty($date2)){
            $sql.= " where birthdate between '$date1' and '$date2'";
        }else{
            $sql.=' limit 0';
        }
        
        $raw = \Yii::$app->db_hos->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$raw,
            'pagination'=>[
                'pageSize'=>35
            ],
            'sort'=>[
                'attributes'=>['เลขบัตร','pname']
            ]
        ]);
        return $this->render('report1',[
            'dataProvider'=>$dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            
        ]);
    }
    
    public function actionReport2($province=NULL,$amphur=NULL,$tambon=NULL){
      
        $sql = "select * from c_tambon";
        if(!empty($tambon)){
            $sql.=" where tamboncodefull = $tambon";
        }else{
            $sql.=" limit 0";
        }
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$raw
        ]);
        
        return $this->render('report2',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionReport3(){
        $sql = " select * from data_atb where byear = '2560'";
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        
        
        return $this->render('report3',[
            'raw'=>$raw
        ]);
    }
    
    public function actionReport4(){
        return $this->render('report4');
    }
    
    public function actionMap(){
        $sql = "select * from chospital_gis where areacode like '71%'";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        
        $json_hos = [];
        
        foreach ($raw as $val) {
            $json_hos[]=[
                'type'=>'Feature',
                'properties'=>[
                    'title'=>$val['hosname'],
                    'marker-symbol'=>'commercial',
                    'marker-color'=>'#0000FF',
                    'marker-size'=>'small'
                ],
                'geometry'=>[
                    'type'=>'Point',
                    'coordinates'=>[$val['lon']*1,$val['lat']*1]
                ]
            ];
        }
        
       $json_hos = Json::encode($json_hos);
        
        return $this->renderPartial('map',[
            'json_hos'=>$json_hos
        ]);
    }
    
    public function actionGate(){
        return $this->render('gate');
    }
    
    public function actionLine($msg){
        if(!empty($msg)){
           echo MyHelper::sendLineNotify($msg);
        }
    }
    
}
