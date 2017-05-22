<?php

namespace frontend\modules\pcc\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property integer $age
 * @property string $addr
 * @property string $moo
 * @property string $prov_code
 * @property string $amp_code
 * @property string $tmb_code
 * @property string $lat
 * @property string $lon
 * @property string $rapid
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['age'], 'integer'],
            [['prename', 'name', 'lname', 'addr', 'moo', 'prov_code', 'amp_code', 'tmb_code', 'lat', 'lon', 'rapid', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prename' => 'Prename',
            'name' => 'Name',
            'lname' => 'Lname',
            'birth' => 'Birth',
            'age' => 'Age',
            'addr' => 'Addr',
            'moo' => 'Moo',
            'prov_code' => 'Prov Code',
            'amp_code' => 'Amp Code',
            'tmb_code' => 'Tmb Code',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'rapid' => 'Rapid',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
