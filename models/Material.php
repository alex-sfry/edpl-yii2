<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "materials".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $location
 * @property int $created_at
 * @property int $updated_at
 */
class Material extends \yii\db\ActiveRecord
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
        return 'materials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location'], 'default', 'value' => null],
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['type', 'location'], 'string', 'max' => 50],
            ['type', 'in', 'range' => ['raw', 'encoded', 'manufactured']],
            [['name', 'type'], 'unique', 'targetAttribute' => ['name', 'type']],
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
            'location' => 'Location',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
