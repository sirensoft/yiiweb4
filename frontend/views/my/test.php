<?php
use yii\helpers\Html;
?>

<?=Html::a("ไป index แบบ yii", ['my/index']);
?>

<?php
echo $id;
?>
<?php
$id = \Yii::$app->request->get('id');
echo $id;
echo $name;
?>
