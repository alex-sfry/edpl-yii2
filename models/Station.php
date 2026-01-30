<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "stations".
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int|null $dta
 * @property string|null $economy
 * @property string|null $government
 * @property string|null $allegiance
 * @property int $system_id
 * @property int $created_at
 * @property int $updated_at
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'dta', 'economy', 'government', 'allegiance'], 'default', 'value' => null],
            [['name', 'system_id'], 'required'],
            [['dta', 'system_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['type', 'economy', 'government', 'allegiance'], 'string', 'max' => 50],
            [
                ['system_id'],
                'exist',
                'targetClass' => System::class,
                'targetAttribute' => ['system_id' => 'id'],
                'message' => "System doesn't exist."
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'dta' => 'Distance To Arrival',
            'economy' => 'Economy',
            'government' => 'Government',
            'allegiance' => 'Allegiance',
            'system_id' => 'System ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[System]].
     */
    public function getSystem(): \yii\db\ActiveQuery
    {
        return $this->hasOne(System::class, ['id' => 'system_id']);
    }
}
