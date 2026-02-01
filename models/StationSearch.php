<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Station;

/**
 * StationSearch represents the model behind the search form of `app\models\Station`.
 */
class StationSearch extends Station
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['system.name']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dta', 'system_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'type', 'economy', 'government', 'allegiance', 'system.name'], 'safe'],
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
    public function search(array $params, string|null $formName = null): ActiveDataProvider
    {
        $query = Station::find()->joinWith('system as system');

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
            'id' => $this->id,
            'type' => $this->type,
            'economy' => $this->economy,
            'government' => $this->government,
            'allegiance' => $this->allegiance,
            // 'system_id' => $this->system_id
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'system.name', $this->getAttribute('system.name')])
            ->andFilterWhere(['<=', 'dta', $this->dta])
            ->andFilterWhere(['<=', 'created_at', $this->created_at])
            ->andFilterWhere(['<=', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
