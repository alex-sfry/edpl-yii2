<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\System;

/**
 * SystemSearch represents the model behind the search form of `app\models\System`.
 */
class SystemSearch extends System
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'population'], 'integer'],
            [
                ['name', 'primary_economy', 'secondary_economy', 'government', 'allegiance', 'security', 'star_type'],
                'string'
            ],
            [['created_at, updated_at'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     */
    public function search(array $params,  string|null $formName = null): ActiveDataProvider
    {
        $query = System::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'primary_economy' => $this->primary_economy,
            'secondary_economy' => $this->secondary_economy,
            'government' => $this->government,
            'allegiance' => $this->allegiance,
            'security' => $this->security,
            'star_type' => $this->star_type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])->andFilterWhere(['>=', 'population', $this->population]);
        return $dataProvider;
    }
}
