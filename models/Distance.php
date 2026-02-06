<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distances".
 *
 * @property int $id
 * @property int $system_1_id
 * @property int $system_2_id
 * @property float $distance
 */
class Distance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distances';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_1_id', 'system_2_id', 'distance'], 'required'],
            [['system_1_id', 'system_2_id'], 'integer'],
            [['distance'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_1_id' => 'System 1 ID',
            'system_2_id' => 'System 2 ID',
            'distance' => 'Distance',
        ];
    }

    /**
     * Gets query for [[System 1]].
     */
    public function getSystem1(): \yii\db\ActiveQuery
    {
        return $this->hasOne(System::class, ['id' => 'system_1_id']);
    }

    /**
     * Gets query for [[System 2]].
     */
    public function getSystem2(): \yii\db\ActiveQuery
    {
        return $this->hasOne(System::class, ['id' => 'system_2_id']);
    }
}
