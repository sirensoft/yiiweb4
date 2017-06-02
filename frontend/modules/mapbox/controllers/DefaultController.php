<?php

namespace frontend\modules\mapbox\controllers;

use yii\web\Controller;
use frontend\modules\pcc\models\TambonGis;
use yii\helpers\Json;

/**
 * Default controller for the `mapbox` module
 */
class DefaultController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLayerPerson() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //$peron_point = [];
        $peron_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ก.'
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [100.0124456, 16.14523]
            ]
        ];
        return Json::encode($peron_point);
    }

    public function actionMap() {

        $peron_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ก.',
                'title' => 'ไตเติ้ล',
                'description'=>'รายละเอียด....',
                'marker-color' => "#fc4353",//สี
                "marker-size" => "large",//ขนาด
                "marker-symbol" => "p"//สัญลักษณ์
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [100.0124456, 16.14523]
            ]
        ];
        
        $peron_point = Json::encode($peron_point);
        return $this->renderPartial('map', [
                    'person_point' => $peron_point
        ]);
    }

}
