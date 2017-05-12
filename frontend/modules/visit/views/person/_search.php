<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\TbpersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbperson-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prename') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'age_y') ?>

    <?php // echo $form->field($model, 'addr') ?>

    <?php // echo $form->field($model, 'prov_code') ?>

    <?php // echo $form->field($model, 'amp_code') ?>

    <?php // echo $form->field($model, 'tmb_code') ?>

    <?php // echo $form->field($model, 'dischage_code') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
