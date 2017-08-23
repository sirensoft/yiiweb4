<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\widgets\Select2;
use frontend\modules\report\models\Province;
use yii\helpers\ArrayHelper;


$this->title = 'รายงาน 2';
$this->params['breadcrumbs'][] = ['label' => 'รวมรายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'รายงาน 2';
?>

<?php
$form = ActiveForm::begin([
            'method' => 'get',
            'action' => Url::to(['report2'])
        ]);
?>
<div class="row" style="margin-bottom: 5px">
    <div class="col-md-3">
        จังหวัด
        <?php
            $mProvince = Province::find()->all();
            $items = ArrayHelper::map($mProvince,'changwatcode','changwatname' );
           echo Select2::widget([
               'name'=>'province',
               'data'=>$items
           ]);
        ?>
    </div>
    <div class="col-md-3">
        <br>
        <?= Html::submitButton('ตกลง', ['class' => 'btn btn-danger']) ?>
    </div>
</div>
<?php
ActiveForm::end();
?>

