<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "economy_commodity".
 *
 * @property int $id
 * @property int $commodity_id
 * @property string $economy
 * @property string $trade_type
 */
class EconomyCommodity extends \yii\db\ActiveRecord
{
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
            ['commodity_id', 'integer'],
            [['economy', 'trade_type'], 'string', 'max' => 50],
            [
                ['commodity_id', 'economy', 'trade_type'],
                'unique',
                'targetAttribute' => ['commodity_id', 'economy', 'trade_type']
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
            'economy' => 'Economy',
            'trade_type' => 'Trade Type',
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
