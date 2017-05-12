<?php

namespace frontend\modules\visit\models;

use Yii;

/**
 * This is the model class for table "tbperson".
 *
 * @property integer $id
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property string $sex
 * @property integer $age_y
 * @property string $addr
 * @property string $prov_code
 * @property string $amp_code
 * @property string $tmb_code
 * @property string $dischage_code
 * @property string $color
 * @property string $note
 */
class Tbperson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbperson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lname'],'required'],
            [['birth'], 'safe'],
            [['age_y'], 'integer'],
            [['note'], 'string'],
            [['prename', 'name', 'lname', 'sex', 'addr', 'prov_code', 'amp_code', 'tmb_code', 'dischage_code', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prename' => 'คำนำ',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'birth' => 'วดป.เกิด',
            'sex' => 'เพศ',
            'age_y' => 'อายุ(ป)',
            'addr' => 'ที่อยู่',
            'prov_code' => 'จังหวัด',
            'amp_code' => 'อำเภอ',
            'tmb_code' => 'ตำบล',
            'dischage_code' => 'สถานะ',
            'color' => 'Color',
            'note' => 'Note',
        ];
    }
}
