<?php

namespace frontend\modules\test1\controllers;

use yii\web\Controller;

/**
 * Default controller for the `test1` module
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

    public function actionTest1()
    {
    	// การทำงาน ของโปรแกรม
    	return $this->render('test1');
    }

}
