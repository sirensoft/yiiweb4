<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'date_add')->textInput() ?>

    <?= $form->field($model, 'device_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_sn')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_recept')->textInput() ?>

    <?= $form->field($model, 'job_rapid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <?= $form->field($model, 'job_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
