<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


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
        <br>
        <?= Html::submitButton('ตกลง', ['class' => 'btn btn-danger']) ?>
    </div>
</div>
<?php
ActiveForm::end();
?>

