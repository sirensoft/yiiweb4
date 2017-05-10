<?php

namespace frontend\modules\orm\controllers;

use yii\web\Controller;

/**
 * Default controller for the `data` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
       public function actions()
    {
        return [           
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                //'fixedVerifyCode' => '1234',
            ],
        ];
    }
    
}
