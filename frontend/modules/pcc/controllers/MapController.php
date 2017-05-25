<?php
namespace frontend\modules\pcc\controllers;
use yii\web\Controller;

class MapController extends Controller{
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionTest1(){
        return $this->render('test1');
    }
}

