<?php
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;

\Yii::$app->session->setFlash('warning', 'Your message');

$date = date('Ymd');


echo Html::button('Popup ', ['id'=>'btn-pop','data'=>$date,'class'=>'btn']);
echo " ";
echo Html::button('Modal',['id'=>'btn-modal','class'=>'btn']);
//echo Html::img('@web/images/loading.gif');

Modal::begin([
    'header' => 'Title',
    'size' => 'modal-lg',
    'id' => 'modal',
]);
echo "<div id='modalContent'><div style'text-align:cente'>".Html::img('@web/images/loading.gif')."</div>";
Modal::end();



$route = Url::to(['/site/index','data'=>$date]);
$route2 = Url::to(['/site/contactt']);
$js =<<<JS
     $('#btn-pop').click(function(){
        var date=$(this).attr("data");
        var win=window.open("$route&data2="+date,"win","top=100,left=200,width=600,height=400");
     });
     
     $('#btn-modal').click(function(){
         $('#modal').modal('show').find('#modalContent').load('$route2');
     });
JS;
$this->registerJs($js);
      

