<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IwuCertTask;

/**
 * CertControllerSearch represents the model behind the search form of `backend\models\IwuCertTask`.
 */
class CertControllerSearch extends IwuCertTask
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'source', 'del_flag'], 'integer'],
            [['task_id', 'user_id', 'user_name', 'mobile', 'email', 'biz_type', 'process_state', 'channel', 'bill_state', 'report_state', 'message', 'add_time', 'update_time', 'ocr_name'], 'safe'],
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
        $query = IwuCertTask::find()->select(['a.*', 'b.ocr_name','b.ocr_period','b.font_status','b.back_status'])->joinWith('iwuCertOcr b')->from('iwu_cert_task a');

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
            'source' => $this->source,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
            'del_flag' => $this->del_flag,
        ]);

        $query->andFilterWhere(['like', 'task_id', $this->task_id])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'biz_type', $this->biz_type])
            ->andFilterWhere(['like', 'process_state', $this->process_state])
            ->andFilterWhere(['like', 'channel', $this->channel])
            ->andFilterWhere(['like', 'bill_state', $this->bill_state])
            ->andFilterWhere(['like', 'report_state', $this->report_state])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
