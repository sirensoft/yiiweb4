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

    public function actionLayerHome() {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
               
        $home_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ก.',
                'marker-color' => "#00ff00",//สี
                "marker-size" => "large",//ขนาด
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [99.9124456, 16.14523]
            ]
        ];
          $home_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ข.',
                'marker-color' => "#3399ff",//สี
                "marker-size" => "large",//ขนาด
                'title' => 'ไตเติ้ล',
                'description'=>'รายละเอียด....',
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [100.1124456, 16.04523]
            ]
        ];
        
        return Json::encode($home_point);
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
