<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\visit\models\Tbperson */

$this->title = 'Create Tbperson';
$this->params['breadcrumbs'][] = ['label' => 'Tbpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbperson-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
