<?php

namespace DmitriiKoziuk\yii2Redirect\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Redirect\entities\RedirectEntity;

/**
 * RedirectEntitySearch represents the model behind the search form of `DmitriiKoziuk\yii2Redirect\entities\RedirectEntity`.
 */
class RedirectEntitySearch extends RedirectEntity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_url_hash', 'from_url', 'to_url'], 'safe'],
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
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RedirectEntity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'from_url_hash', $this->from_url_hash])
            ->andFilterWhere(['like', 'from_url', $this->from_url])
            ->andFilterWhere(['like', 'to_url', $this->to_url]);

        return $dataProvider;
    }
}
