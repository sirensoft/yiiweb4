<?php
namespace frontend\modules\test1\controllers;
use yii\web\Controller;

class DataController extends Controller{
	public function actionData1(){
		return $this->render('data1');
	}

	public function actionData2(){
		return $this->render('data2');
	}

}

?>