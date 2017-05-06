<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */
?>
<div class="data-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'val',
            'owner',
        ],
    ]) ?>

</div>
