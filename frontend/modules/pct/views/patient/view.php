<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pct\models\Patient */
?>
<div class="patient-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cid',
            'name',
            'lname',
            'birth',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
