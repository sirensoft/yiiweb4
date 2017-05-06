<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'val')->textInput(['maxlength' => true]) ?>

    <?php
    $arrays = User::find()->all();
    $items = ArrayHelper::map($arrays, 'id', 'username');
    echo $form->field($model, 'owner')->dropDownList($items);
    ?>


        <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

<?php ActiveForm::end(); ?>

</div>
