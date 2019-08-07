<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmApiLog;

/**
 * ApiLogSearch represents the model behind the search form of `backend\models\TLmApiLog`.
 */
class ApiLogSearch extends TLmApiLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['function_code', 'key_code', 'key_value', 'request_json', 'response_json', 'result_code', 'add_day', 'add_time'], 'safe'],
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
    public function search($params, $env = '')
    {
        $tl = new TLmApiLog();
        $tl->setEnv($env);
        $query = $tl->find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'add_time' => SORT_DESC,
//                    'update_time' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'add_time' => $this->add_time,
        ]);

        $query->andFilterWhere(['like', 'function_code', $this->function_code])
            ->andFilterWhere(['like', 'key_code', $this->key_code])
            ->andFilterWhere(['like', 'key_value', $this->key_value])
            ->andFilterWhere(['like', 'request_json', $this->request_json])
            ->andFilterWhere(['like', 'response_json', $this->response_json])
            ->andFilterWhere(['like', 'result_code', $this->result_code])
            ->andFilterWhere(['like', 'add_day', $this->add_day]);

        return $dataProvider;
    }
}
