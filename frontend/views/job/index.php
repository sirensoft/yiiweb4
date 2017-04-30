<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use frontend\models\CDeviceType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งซ่อม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-index">

    <p>
        <?= Html::a('แจ้งซ่อม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'responsiveWrap'=>FALSE,
        'pjax'=>TRUE,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'panel'=>[
            'before'=>'รายการแจ้งซ่อม'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_add',
            //'devicetype.name',
            [
                'attribute'=>'device_type',
                'value'=>function($model){
                    $dt = CDeviceType::findOne($model->device_type);
                    return $dt->name;
                },
                'filter'=> ArrayHelper::map(CDeviceType::find()->all(),'id','name')
            ],
            'device_sn',
            'customer',
            'date_recept',
            //'job_rapid',
            [
                'attribute'=>'job_rapid',
                'label'=>'',
                'contentOptions' => function ($model) {
                if ($model->job_rapid == 4) {
                    return ['style' => "color:white;background-color:red;",'class' => 'text-center'];
                }
                return ['style' => "color:black;background-color:green;",'class' => 'text-center'];
            },
            ],
            'job_status',
            'date_end',
            // 'job_note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
