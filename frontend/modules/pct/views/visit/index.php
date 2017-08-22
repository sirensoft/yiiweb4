<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pct\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเยี่ยม';
$this->params['breadcrumbs'][] = ['label'=>'ทะเบียน','url'=>['/pct/patient/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="visit-index">
    <?=$pid?>
 
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เยี่ยม', ['create','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'patient.name',
            'bp',
            'note',
            'created_by',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
