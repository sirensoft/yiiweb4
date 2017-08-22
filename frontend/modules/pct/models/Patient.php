<?php

namespace frontend\modules\pct\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $cid
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 */
class Patient extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cid','name','lname'],'required'],
            [['cid'],'unique'],
            [['birth', 'created_at', 'updated_at'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['name', 'lname', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cid' => 'เลข13หลัก',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'birth' => 'วดป.เกิด',
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
                'value'=>new Expression("NOW()")
            ],
            ['class' => BlameableBehavior::className()]
        ];
    }

}
