<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\modules\pcc\models\Person;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\HighchartsAsset;
HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);


$model_person = Person::findOne($pid);


/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pcc\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเยี่ยม';
$this->params['breadcrumbs'][] = ['label'=>'ทะเบียน','url'=>['/pcc/person/index']];
$this->params['breadcrumbs'][] = "รายการเยี่ยม";
?>
<div class="visit-index">

    <h1><?php echo $model_person->name." ".$model_person->lname; ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เยี่ยม', ['/pcc/visit/create','pid'=>$pid], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>['before'=>''],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'person_id',
            'date_visit',
            'weight',
            'height',
             [
                 'attribute'=>'sbp',
                 'value'=>function($model){
                    return $model->sbp."/".$model->dbp;
                 }
             ],
             //'dbp',
            // 'note',
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <div id="container"></div>
    <?php
    $raw = $dataProvider->getModels();
   
    $day = [];
    $weight =[];
    
    foreach ($raw as $value) {
       $day[]= $value->date_visit; 
       $weight[]= (int)($value->weight);        
       
    }
    $day = json_encode($day);
    $weight = json_encode($weight);
    
    //print_r($weight);
    
    
    //$data1 = ArrayHelper::map($raw,'date_visit','weight');
    //print_r($data1);
    
$js=<<<JS
 Highcharts.chart('container', {
    credits: {
            enabled: false
    },
    title: {
        text: 'Title'
    },

    subtitle: {
        text: 'subtitle'
    },
    
    xAxis:{
        categories:$day
    },

    yAxis: {
        title: {
            text: 'นำหนัก(กก.)'
        },
         min: 10,
         max: 200,
         tickInterval: 10,
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },   

    series: [{
        name: 'น้ำหนัก',
        data: $weight,
        color:'red'
    }]

});   
JS;
$this->registerJs($js);
    
    
    ?>
    
</div>
