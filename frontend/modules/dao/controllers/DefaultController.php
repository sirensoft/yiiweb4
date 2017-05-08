<?php

namespace frontend\modules\dao\controllers;

use yii\web\Controller;
use frontend\modules\dao\models\RptSearch;

/**
 * Default controller for the `dao` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RptSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
}
