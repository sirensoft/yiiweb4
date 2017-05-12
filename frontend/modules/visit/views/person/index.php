<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\visit\models\TbpersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbpeople';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbperson-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbperson', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'prename',
            'name',
            'lname',
            'birth',
            // 'sex',
            // 'age_y',
            // 'addr',
            //'prov_code',
            [
                'attribute'=>'prov_code',
                'value'=>'prov.changwatname'
               
            ],
             'amp_code',
             'tmb_code',
            // 'dischage_code',
            // 'color',
            // 'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
