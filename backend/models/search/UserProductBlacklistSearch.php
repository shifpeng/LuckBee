<?php


namespace backend\models\search;

use backend\components\LogUtil;
use backend\models\TLmfApiProductInfoContact;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserProductBlacklistSearch extends TLmfApiProductInfoContact
{
    public function rules()
    {
        return [
            [['id'], 'number'],
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

//        $params['UserProductBlacklistSearch']['id']=$params;
//        LogUtil::log(json_encode($params['UserProductBlacklistSearch']['id']));
//        $this->load($params);
        $productIdList = isset($params) ? $params : [];


//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        $query->where(['in', 'product_id', $productIdList]);

        return $dataProvider;
    }
}