<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmUserVerifyRecord;

/**
 * UserVerifyRecordSearch represents the model behind the search form of `backend\models\TLmUserVerifyRecord`.
 */
class UserVerifyRecordSearch extends TLmUserVerifyRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'status', 'status_type', 'del_flag'], 'integer'],
            [['lm_member_id', 'operate_time', 'reason', 'add_time', 'update_time'], 'safe'],
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
        $tl = new TLmUserVerifyRecord();
        $tl->setEnv($env);
        $query = $tl->find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'add_time' => SORT_DESC,
                    'update_time' => SORT_DESC,
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
            'product_id' => $this->product_id,
            'operate_time' => $this->operate_time,
            'status' => $this->status,
            'status_type' => $this->status_type,
            'del_flag' => $this->del_flag,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'lm_member_id', $this->lm_member_id])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
