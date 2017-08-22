<?php

use kartik\widgets\DepDrop;
use frontend\modules\report\models\Province;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$mProvince = Province::find()->all();
$items = ArrayHelper::map($mProvince, 'changwatcode', 'changwatname');
?>
<form>
<?php
echo Select2::widget([
    'name' => 'province',
    'data' => $items,
    'options' => [
        'placeholder' => 'Select provinces ...',
        'multiple' => FALSE,
        'id'=>'province'
    ],
]);

echo DepDrop::widget([
    'name'=>'amphur',
    'options' => ['id' => 'amphur'],
    'pluginOptions' => [
        'depends' => ['province'],
        'placeholder' => 'เลือก...',
        'url' => Url::to(['/report/json/getamp'])
    ],
    
]);

echo DepDrop::widget([
    'name'=>'tambon',
    'options' => ['id' => 'tambon'],
    'pluginOptions' => [
        'depends' => ['amphur'],
        'placeholder' => 'เลือก...',
        'url' => Url::to(['/report/json/gettmb'])
    ],
    
]);

?>
    <button type="submit">ตกลง</button>
</form>

