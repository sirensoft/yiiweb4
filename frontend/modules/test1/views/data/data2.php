....
.....

<?php
    use frontend\modules\test1\models\Patient;
    
    $model = new Patient();
    $model->cid = '1122333444';
    $model->name = 'อุเทน';
    $model->lname = 'จาดยางโทน';
    $model->birth = '1980-04-18';
    $model->save();
    
    $data = [
        'cid'=>'0000000',
        'name'=>'นาย ก',
        'lname'=>'xxxx',
        'birth'=>'2012-06-12'
    ];
    
    $model = new Patient();
    $model->attributes = $data;
    $model->save();
    
    $model = Patient::findOne(2);
    if($model){
        $model->delete();
    }
    
    $model = Patient::findOne(1);
    if($model){
        $model->name = 'qqqqqqqq';
        $model->save();
    }
    
    use kartik\grid\GridView;
    use yii\data\ActiveDataProvider;
    
    $model = Patient::find();
    $dataProvider = new ActiveDataProvider([
        'query'=>$model
    ]);
    echo GridView::widget([
        'dataProvider'=>$dataProvider,
        'panel'=>['before'=>'ข้อมูลผู้ป่วย']
    ]);



    
    
    
    
    
    
    
    
    
    
    