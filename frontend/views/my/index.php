<?php

use yii\helpers\Html;
?>
<h3>รายการ....</h3>
<a href="index.php?r=my/test">ไป test แบบเดิม</a>
<br>
<?php
echo Html::a('<i class="glyphicon glyphicon-ok"></i>', [
    'my/test',
    'id' => '001',
    'name' => 'อุเทน'
],['class'=>'btn btn-success btn-lg']);  // warning,success , primary ,danger ,info

echo "<br>";

echo Html::a("ไป About", ['site/about']);
?>
