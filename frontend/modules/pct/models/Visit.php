<?php

namespace frontend\modules\pct\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use frontend\modules\pct\models\Patient;

/**
 * This is the model class for table "visit".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $bp
 * @property string $note
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 */
class Visit extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['pid','bp'],'required'],
            [['pid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['bp', 'note', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'bp' => 'ความดัน',
            'note' => 'บันทึกการเยี่ยม',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression("NOW()")
            ],
            ['class' => BlameableBehavior::className()]
        ];
    }
    
    public function getPatient(){
        return $this->hasOne(Patient::className(), ['id'=>'pid']);
    }
    

}
