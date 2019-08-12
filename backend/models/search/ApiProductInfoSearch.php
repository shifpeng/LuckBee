<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmfApiProductInfoContact;

/**
 * ApiProductInfoSearch represents the model behind the search form of `backend\models\TLmfApiProductInfoContact`.
 */
class ApiProductInfoSearch extends TLmfApiProductInfoContact
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'del_flag', 'bump_type', 'can_repay_change_card', 'term_to_time_num', 'term_to_time_unit', 'carrier_bill_type', 'carrier_report_type'], 'integer'],
            [['company_name', 'product_name', 'processor', 'rsa_pri_key', 'rsa_pub_key', 'product_pub_key', 'product_des_key', 'remark', 'add_time', 'update_time', 'verify_url', 'push_base_url', 'push_supplement_url', 'get_card_list_url', 'bind_card_sms_url', 'bind_card_url', 'get_approve_result_url', 'approve_ensure_url', 'approve_ensure_sms_url', 'get_order_info_url', 'get_agreement_info_url', 'get_repay_plan_url', 'repay_url', 'repay_sms_url', 'repay_detail_info_url', 'calc_url', 'extend_stage_detail_url', 'do_extend_stage_url', 'app_id', 'support_banks', 'take_money_url', 'open_account_url', 'push_info_confirm_url', 'approve_ensure_extension_url', 'loan_amount_period_url', 'loan_calc_url', 'loan_card_list_url', 'loan_band_card_url', 'loan_card_verification_url'], 'safe'],
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
    public function search($params, $env = "")
    {
        $tl = new TLmfApiProductInfoContact();
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
            'product_id' => $this->product_id,
            'del_flag' => $this->del_flag,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
            'bump_type' => $this->bump_type,
            'can_repay_change_card' => $this->can_repay_change_card,
            'term_to_time_num' => $this->term_to_time_num,
            'term_to_time_unit' => $this->term_to_time_unit,
            'carrier_bill_type' => $this->carrier_bill_type,
            'carrier_report_type' => $this->carrier_report_type,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'processor', $this->processor])
            ->andFilterWhere(['like', 'rsa_pri_key', $this->rsa_pri_key])
            ->andFilterWhere(['like', 'rsa_pub_key', $this->rsa_pub_key])
            ->andFilterWhere(['like', 'product_pub_key', $this->product_pub_key])
            ->andFilterWhere(['like', 'product_des_key', $this->product_des_key])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'verify_url', $this->verify_url])
            ->andFilterWhere(['like', 'push_base_url', $this->push_base_url])
            ->andFilterWhere(['like', 'push_supplement_url', $this->push_supplement_url])
            ->andFilterWhere(['like', 'get_card_list_url', $this->get_card_list_url])
            ->andFilterWhere(['like', 'bind_card_sms_url', $this->bind_card_sms_url])
            ->andFilterWhere(['like', 'bind_card_url', $this->bind_card_url])
            ->andFilterWhere(['like', 'get_approve_result_url', $this->get_approve_result_url])
            ->andFilterWhere(['like', 'approve_ensure_url', $this->approve_ensure_url])
            ->andFilterWhere(['like', 'approve_ensure_sms_url', $this->approve_ensure_sms_url])
            ->andFilterWhere(['like', 'get_order_info_url', $this->get_order_info_url])
            ->andFilterWhere(['like', 'get_agreement_info_url', $this->get_agreement_info_url])
            ->andFilterWhere(['like', 'get_repay_plan_url', $this->get_repay_plan_url])
            ->andFilterWhere(['like', 'repay_url', $this->repay_url])
            ->andFilterWhere(['like', 'repay_sms_url', $this->repay_sms_url])
            ->andFilterWhere(['like', 'repay_detail_info_url', $this->repay_detail_info_url])
            ->andFilterWhere(['like', 'calc_url', $this->calc_url])
            ->andFilterWhere(['like', 'extend_stage_detail_url', $this->extend_stage_detail_url])
            ->andFilterWhere(['like', 'do_extend_stage_url', $this->do_extend_stage_url])
            ->andFilterWhere(['like', 'app_id', $this->app_id])
            ->andFilterWhere(['like', 'support_banks', $this->support_banks])
            ->andFilterWhere(['like', 'take_money_url', $this->take_money_url])
            ->andFilterWhere(['like', 'open_account_url', $this->open_account_url])
            ->andFilterWhere(['like', 'push_info_confirm_url', $this->push_info_confirm_url])
            ->andFilterWhere(['like', 'approve_ensure_extension_url', $this->approve_ensure_extension_url])
            ->andFilterWhere(['like', 'loan_amount_period_url', $this->loan_amount_period_url])
            ->andFilterWhere(['like', 'loan_calc_url', $this->loan_calc_url])
            ->andFilterWhere(['like', 'loan_card_list_url', $this->loan_card_list_url])
            ->andFilterWhere(['like', 'loan_band_card_url', $this->loan_band_card_url])
            ->andFilterWhere(['like', 'loan_card_verification_url', $this->loan_card_verification_url]);

        return $dataProvider;
    }
}
