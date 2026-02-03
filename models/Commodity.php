<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "commodities".
 *
 * @property int $id
 * @property string $category
 * @property string $name
 */
class Commodity extends \yii\db\ActiveRecord
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
        return 'commodities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'name'], 'required'],
            [['category', 'name'], 'string'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[EconomyCommodity]].
     */
    public function getEconomyCommodity(): \yii\db\ActiveQuery
    {
        return $this->hasMany(EconomyCommodity::class, ['commodity_id' => 'id']);
    }
}
