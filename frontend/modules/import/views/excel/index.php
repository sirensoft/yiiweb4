<?php

use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use frontend\modules\import\models\LogImport;

$this->title = "นำเข้า EXCEL ";
?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($mUpload, 'dataFile')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end() ?>
<hr>
<p>รายการนำเข้า</p>
<?php
$model = LogImport::find();
$dataProvider = new yii\data\ActiveDataProvider([
    'query'=>$model
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider
]);
?>