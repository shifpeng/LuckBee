<?php


namespace backend\controllers;

use backend\models\RequestConfig;
use backend\components\CurlInterface;
use backend\models\search\UserProductBlacklistSearch;
use backend\models\TLmfApiProductInfoContact;
use Yii;

class UserProductBlacklistController extends BaseController
{
    public function actionIndex()
    {
//        $arr = [];
////        18501610815
//        if (Yii::$app->request->isPost) {
//            $postArr = Yii::$app->request->post('TLmfApiProductInfoContact');
//            $data = ['phoneNo' => $postArr['id']];
//            $curl = new  CurlInterface(json_encode($data), 6);
//            $result = $curl->execute('http://10.32.16.37:10657/lmuser-web/user-prebump/v1/exceptProduct', 'POST');
//            $arr = $result['data']['productList'];
//        }
//        $tp = new TLmfApiProductInfoContact();
//

        $searchModel = new UserProductBlacklistSearch();
        $postArr = isset(Yii::$app->request->queryParams['UserProductBlacklistSearch']) ? Yii::$app->request->queryParams['UserProductBlacklistSearch'] : [];
//        $this->log(json_encode(Yii::$app->request->queryParams));
        $arr = [];
        if (isset($postArr['id'])) {
            $data = ['phoneNo' => $postArr['id']];
            $curl = new  CurlInterface(json_encode($data), 6);
            $model = RequestConfig::findOne(['request_fun' => 'black_product']);
            $result = $curl->execute($model->request_url, 'POST');
            $arr = $result['data']['productList'];
            $searchModel->id = $postArr['id'];
        }
        $dataProvider = $searchModel->search($arr);
//        $res = $tp->getAppName($arr);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}