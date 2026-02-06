<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "economy_commodity".
 *
 * @property int $id
 * @property string $commodity
 * @property string $category
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
            [['commodity', 'category', 'economy', 'trade_type'], 'required'],
            [['commodity'], 'string', 'max' => 255],
            [['category', 'category', 'economy', 'trade_type'], 'string', 'max' => 50],
            [
                ['commodity', 'category', 'economy', 'trade_type'],
                'unique',
                'targetAttribute' => ['commodity', 'category', 'economy', 'trade_type']
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
            'commodity' => 'Commodity',
            'category' => 'Category',
            'economy' => 'Economy',
            'trade_type' => 'Trade Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
