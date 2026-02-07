<?php

namespace app\modules\noar\models;

class SystemForm extends \yii\base\Model
{
    public $name;
    public $primaryEconomy;
    public $secondaryEconomy;
    public $allegiance;
    public $security;
    public $population;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 255],
            [['primaryEconomy', 'secondaryEconomy', 'allegiance', 'security'], 'string'],
            ['population', 'integer'],
            ['primaryEconomy', 'in', 'range' => array_keys(economies())],
            ['secondaryEconomy', 'in', 'range' => array_keys(economies())],
            ['allegiance', 'in', 'range' => array_keys(allegiances())],
            ['security', 'in', 'range' => array_keys(sec_levels())],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'primaryEconomy' => 'Primary Economy',
            'secondaryEconomy' => 'Secondary Economy',
            'allegiance' => 'Allegiance',
            'security' => 'Security',
            'population' => 'Population',
        ];
    }
}