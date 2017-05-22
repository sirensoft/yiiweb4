<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pcc\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $item = [
        'นาย'=>'นาย',
        'นาง'=>'นาง',
        'นางสาว'=>'นางสาว'
    ];
    ?>

    <?= $form->field($model, 'prename')->dropDownList($item,[
        'prompt'=>'---เลือก---'
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'วดป.เกิด...'],
            'pickerButton' => [
                'icon' => 'calendar',
            ],
            'language' => 'th',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>

    <?= $form->field($model, 'addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prov_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amp_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmb_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rapid')->textInput(['maxlength' => true]) ?>

   
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
