<?php

use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\widgets\DatePicker;

$this->title = 'รายงาน 1';
$this->params['breadcrumbs'][] = ['label' => 'รวมรายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'รายงาน 1';
?>

<?php
$form = ActiveForm::begin([
            'method' => 'get',
            'action' => Url::to(['report1'])
        ]);
?>
<div class="row" style="margin-bottom: 5px">
    <div class="col-md-3">
        เกิดระหว่าง:
        <?php
        echo DatePicker::widget([
            'name' => 'date1',
            'type' => DatePicker::TYPE_INPUT,
            'value' => $date1,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>
    <div class="col-md-3">
        ถึง:
        <?php
        echo DatePicker::widget([
            'name' => 'date2',
            'type' => DatePicker::TYPE_INPUT,
            'value' => $date2,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('ตกลง', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px']) ?>
    </div>
</div>
<?php
ActiveForm::end();
?>

<?php
echo GridView::widget([
    'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '-'
    ],
    'dataProvider' => $dataProvider,
    'panel' => ['before' => 'รายการ', 'heading' => 'ข้อมูลประชากร']
]);

