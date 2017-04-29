<?php
use yii\helpers\Html;
?>
<h3>รายการ....</h3>
<a href="index.php?r=my/test">ไป test แบบเดิม</a>
<br>
<?php
echo Html::a("ไป test แบบ yii", ['my/test']);
?>
