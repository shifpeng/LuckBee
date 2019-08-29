<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TLmUserBaseInfo;

/**
 * UserBaseInfoSearch represents the model behind the search form of `backend\models\TLmUserBaseInfo`.
 */
class UserBaseInfoSearch extends TLmUserBaseInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'education_level', 'social_security', 'vehicle_ownership', 'work_type', 'operating_years', 'work_years', 'del_flag', 'source', 'status'], 'integer'],
            [['lm_member_id', 'user_name', 'id_card_no', 'ip', 'location', 'add_time', 'update_time'], 'safe'],
            [['max_monthly_repayment', 'operating_income', 'monthly_income'], 'number'],
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
        $tl = new TLmUserBaseInfo();
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
            'max_monthly_repayment' => $this->max_monthly_repayment,
            'education_level' => $this->education_level,
            'social_security' => $this->social_security,
            'vehicle_ownership' => $this->vehicle_ownership,
            'work_type' => $this->work_type,
            'operating_income' => $this->operating_income,
            'operating_years' => $this->operating_years,
            'monthly_income' => $this->monthly_income,
            'work_years' => $this->work_years,
            'del_flag' => $this->del_flag,
            'source' => $this->source,
            'status' => $this->status,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'lm_member_id', $this->lm_member_id])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'id_card_no', $this->id_card_no])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'location', $this->location]);


//        $query_master = TLmUserBaseInfo::find()->select('*')

        return $dataProvider;
    }
}
