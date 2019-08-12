<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmApiOrderOperateConfigInfo;

/**
 * OrderOperateInfoSearch represents the model behind the search form of `backend\models\TLmApiOrderOperateConfigInfo`.
 */
class OrderOperateInfoSearch extends TLmApiOrderOperateConfigInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'del_flag', 'user_filter_status', 'user_filter_times', 'pre_apply_status', 'pre_apply_times', 'apply_status', 'apply_times', 'source', 'product_id', 'if_batch_push'], 'integer'],
            [['order_no', 'add_time', 'update_time', 'lm_member_id', 'user_filter_reason'], 'safe'],
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
        $tl = new TLmApiOrderOperateConfigInfo();
        $tl->setEnv($env);
        $query = $tl->find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
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
            'del_flag' => $this->del_flag,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
            'user_filter_status' => $this->user_filter_status,
            'user_filter_times' => $this->user_filter_times,
            'pre_apply_status' => $this->pre_apply_status,
            'pre_apply_times' => $this->pre_apply_times,
            'apply_status' => $this->apply_status,
            'apply_times' => $this->apply_times,
            'source' => $this->source,
            'product_id' => $this->product_id,
            'if_batch_push' => $this->if_batch_push,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'lm_member_id', $this->lm_member_id])
            ->andFilterWhere(['like', 'user_filter_reason', $this->user_filter_reason]);

        return $dataProvider;
    }
}
