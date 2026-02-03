<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "economy_commodity".
 *
 * @property int $id
 * @property int $commodity_id
 * @property string $economy
 * @property string $trade_type
 * @property int $created_at
 * @property int $updated_at
 */
class EconomyCommodity extends \yii\db\ActiveRecord
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
        return 'economy_commodity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['commodity_id', 'economy', 'trade_type'], 'required'],
            [['commodity_id'], 'integer'],
            [['economy', 'trade_type'], 'string', 'max' => 50],
            [
                ['commodity_id', 'economy', 'trade_type'],
                'unique',
                'targetAttribute' => ['commodity_id', 'economy', 'trade_type']
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
            'commodity_id' => 'Commodity ID',
            'economy' => 'Economy',
            'trade_type' => 'Trade Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Commodity]].
     */
    public function getCommodity(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Commodity::class, ['id' => 'commodity_id']);
    }
}
