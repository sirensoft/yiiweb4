<?php
$this->title = 'app ของฉัน';
use yii\helpers\Html;
 
?>

<p><a href="index.php?r=test1/data/data1">ไปลิงค์ 1</a>
<p><?=Html::a('ไปลิงค์ 1',['/test1/data/data1'])?>
<p><?=Html::a('ไปลิงค์ 2',['/test1/data/data2'],['class'=>'btn btn-success btn-lg','target'=>'_blank'])?>
