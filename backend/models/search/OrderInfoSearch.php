<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmApiOrderInfo;

/**
 * OrderInfoSearch represents the model behind the search form of `backend\models\TLmApiOrderInfo`.
 */
class OrderInfoSearch extends TLmApiOrderInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'distributor_id', 'tenant_company_id', 'tenant_product_id', 'source', 'reloan', 'term', 'term_unit', 'activated', 'finished', 'distributor_statistics_valid', 'status', 'get_approval_result_times', 'repush_base_times', 'repush_supplement_times', 'del_flag', 'settle_status', 'user_is_all_channel_new', 'is_extend_stage', 'filter_flag'], 'integer'],
            [['lm_member_id', 'user_name', 'user_phone_no', 'order_no', 'base_data_id', 'base_data_hash', 'supplement_data_id', 'supplement_data_hash', 'pre_apply_time', 'apply_time', 'add_time', 'update_time', 'p_value', 'tag', 'channel_tag', 'taobao_token'], 'safe'],
            [['amount', 'total_repayment_amount', 'total_arrival_amount', 'interest_and_cost_amount'], 'number'],
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
        $tl = new TLmApiOrderInfo();
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
            'distributor_id' => $this->distributor_id,
            'tenant_company_id' => $this->tenant_company_id,
            'tenant_product_id' => $this->tenant_product_id,
            'source' => $this->source,
            'reloan' => $this->reloan,
            'amount' => $this->amount,
            'term' => $this->term,
            'term_unit' => $this->term_unit,
            'total_repayment_amount' => $this->total_repayment_amount,
            'total_arrival_amount' => $this->total_arrival_amount,
            'interest_and_cost_amount' => $this->interest_and_cost_amount,
            'activated' => $this->activated,
            'finished' => $this->finished,
            'distributor_statistics_valid' => $this->distributor_statistics_valid,
            'status' => $this->status,
            'get_approval_result_times' => $this->get_approval_result_times,
            'repush_base_times' => $this->repush_base_times,
            'repush_supplement_times' => $this->repush_supplement_times,
            'del_flag' => $this->del_flag,
            'pre_apply_time' => $this->pre_apply_time,
            'apply_time' => $this->apply_time,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
//            'repay_partial' => $this->repay_partial,
            'settle_status' => $this->settle_status,
//            'user_is_new' => $this->user_is_new,
            'user_is_all_channel_new' => $this->user_is_all_channel_new,
            'is_extend_stage' => $this->is_extend_stage,
            'filter_flag' => $this->filter_flag,
        ]);

        $query->andFilterWhere(['like', 'lm_member_id', $this->lm_member_id])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_phone_no', $this->user_phone_no])
            ->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'base_data_id', $this->base_data_id])
            ->andFilterWhere(['like', 'base_data_hash', $this->base_data_hash])
            ->andFilterWhere(['like', 'supplement_data_id', $this->supplement_data_id])
            ->andFilterWhere(['like', 'supplement_data_hash', $this->supplement_data_hash])
            ->andFilterWhere(['like', 'p_value', $this->p_value])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'channel_tag', $this->channel_tag])
            ->andFilterWhere(['like', 'taobao_token', $this->taobao_token]);

        return $dataProvider;
    }
}
