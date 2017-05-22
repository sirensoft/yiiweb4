<?php

namespace frontend\modules\pcc\controllers;
use yii\web\Controller;

class TestController extends Controller{
    
    public function actionTest1(){
        return $this->render('test1');
    }
    
    public function actionTest2(){
        return $this->render('test2');
    }
    
}

