<?php

namespace frontend\modules\data\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $id
 * @property string $val
 * @property string $owner
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['val', 'owner'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'val' => 'Val',
            'owner' => 'Owner',
        ];
    }
}
