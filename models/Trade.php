<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "trades".
 *
 * @property int $id
 * @property int $commodity_id
 * @property int $buy_station_id
 * @property int $buy_price
 * @property int $sell_station_id
 * @property int $sell_price
 * @property int $created_at
 * @property int $updated_at
 */
class Trade extends \yii\db\ActiveRecord
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
        return 'trades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['commodity_id', 'buy_station_id', 'buy_price', 'sell_station_id', 'sell_price'], 'required'],
            [['commodity_id', 'buy_station_id', 'buy_price', 'sell_station_id', 'sell_price'], 'integer'],
            [
                ['buy_station_id'],
                'exist',
                'targetClass' => Station::class,
                'targetAttribute' => ['buy_station_id' => 'id'],
                'message' => "Station doesn't exist."
            ],
            [
                ['sell_station_id'],
                'exist',
                'targetClass' => Station::class,
                'targetAttribute' => ['sell_station_id' => 'id'],
                'message' => "Station doesn't exist."
            ],
            [
                ['commodity_id'],
                'exist',
                'targetClass' => Commodity::class,
                'targetAttribute' => ['commodity_id' => 'id'],
                'message' => "Commodity doesn't exist."
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
            'buy_station_id' => 'Buy Station ID',
            'buy_price' => 'Buy Price',
            'sell_station_id' => 'Sell Station ID',
            'sell_price' => 'Sell Price',
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
    
    /**
     * Gets query for [[BuyStation]].
     */
    public function getBuyStation(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Station::class, ['id' => 'buy_station_id']);
    }
    
    /**
     * Gets query for [[SellStation]].
     */
    public function getSellStation(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Station::class, ['id' => 'sell_station_id']);
    }
}
