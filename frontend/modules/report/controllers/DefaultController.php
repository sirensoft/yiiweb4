<?php

namespace frontend\modules\report\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;

/**
 * Default controller for the `report` module
 */
class DefaultController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $sql = "select * from job";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $raw,
            'pagination'=>[
                'pageSize'=>3
            ]
        ]);

        return $this->render('report1', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
