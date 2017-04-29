<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_add',
            'device_type',
            'device_sn',
            'customer',
            // 'date_recept',
            // 'job_rapid',
            // 'job_status',
            // 'date_end',
            // 'job_note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
