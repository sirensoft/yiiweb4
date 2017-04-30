<?php

namespace frontend\controllers;
use yii\web\Controller;
class AppController extends Controller {
    public function init() {
        parent::init();
    }
    protected function getRole() {
        if (!\Yii::$app->user->isGuest) {
            return \Yii::$app->user->identity->role;
        } else {
            return "?";
        }
    }
    public function permitRole($role = []) {
        $r = $this->getRole();
        if (empty($role)) {
            throw new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
        }
        if (!in_array($r, $role)) {
            throw new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
        }
    }
    
    public  function sendLineNotify($message = NULL) {
        $LINE_API = 'https://notify-api.line.me/api/notify';
        $LINE_TOKEN = 'zWCo2FP7Sk7KwXlVqW1iTCbqiw4NANusdpduIZATVaI';
        $queryData = ['message' => $message];
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $LINE_TOKEN . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ]
        ];
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($LINE_API, FALSE, $context);
        //$res = json_decode($result);
        return $result;
    }
}
