<?php

namespace frontend\modules\testbeta\controllers;

use yii\web\Controller;

/**
 * Default controller for the `TestBeta` module
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
}
