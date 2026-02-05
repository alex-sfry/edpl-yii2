<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "systems".
 *
 * @property int $id
 * @property string $name
 * @property string|null $primary_economy
 * @property string|null $secondary_economy
 * @property string|null $allegiance
 * @property string|null $security
 * @property int|null $population
 * @property int $created_at
 * @property int $updated_at
 */
class System extends \yii\db\ActiveRecord
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
        return 'systems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['primary_economy', 'secondary_economy', 'allegiance', 'security', 'population'],
                'default',
                'value' => null
            ],
            [['name'], 'required'],
            [['name', 'primary_economy', 'secondary_economy', 'allegiance', 'security'], 'string'],
            [['population'], 'integer'],
            ['primary_economy', 'in', 'range' => array_keys(economies())],
            ['secondary_economy', 'in', 'range' => array_keys(economies())],
            ['allegiance', 'in', 'range' => array_keys(allegiances())],
            ['security', 'in', 'range' => array_keys(sec_levels())],
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
            'primary_economy' => 'Primary Economy',
            'secondary_economy' => 'Secondary Economy',
            'allegiance' => 'Allegiance',
            'security' => 'Security',
            'population' => 'Population',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
