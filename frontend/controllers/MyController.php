<?php

namespace frontend\controllers;

class MyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionTest($id,$name,$lname=null){
        
       return $this->render('test',[
           'id'=>$id,
           'name'=>$name,
           'lname'=>$lname
           
       ]);
       
    }

}
