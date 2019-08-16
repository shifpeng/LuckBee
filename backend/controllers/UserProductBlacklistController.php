<?php


namespace backend\controllers;

use backend\models\RequestConfig;
use backend\components\CurlInterface;
use backend\models\search\UserProductBlacklistSearch;
use backend\models\TLmfApiProductInfoContact;
use Yii;
use yii\web\Controller;

class UserProductBlacklistController extends BaseController
{
//    public $enableCsrfValidation=false;

    public function init()
    {
        parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function actionIndex()
    {
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
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'env' => ''
        ]);
    }


    public function actionSearch()
    {
        $searchModel = new UserProductBlacklistSearch();
        $postArr = isset(Yii::$app->request->queryParams['UserProductBlacklistSearch']) ? Yii::$app->request->queryParams['UserProductBlacklistSearch'] : [];
        $ids = [];
        $result = [];
        if (isset($postArr['id'])) {
            $data = ['phoneNo' => $postArr['id']];
            $curl = new  CurlInterface(json_encode($data), 6);
            $model = RequestConfig::findOne(['request_fun' => 'bump_result']);
            $result = $curl->execute($model->request_url, 'POST');
            $ids = array_column($result['data'], 'productId');
//            $this->log(json_encode($ids));
            $searchModel->id = $postArr['id'];
        }


//        array_push($ids, 660, 661);//添加元素

        $dataProvider = $searchModel->search($ids,'pro');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'other_info' => $result,
            'env' => 'pro'
        ]);
    }

    public function actionTest()
    {
        $data = '{"appId":"155253200886585132054","bizParams":"{\"period_nos\":\"2\",\"repay_amount\":\"566.41\",\"success_time\":1565856789,\"orderNo\":\"656038747471895169002\",\"periodNos\":\"2\",\"repayPlace\":2,\"repayStatus\":1,\"successTime\":1565856789,\"remark\":\"总还款额:566.41\"}","method":"REPAY_CALLBACK","sign":"FqyFnlNhu/Kk8lsWZZfi/TlGTqeoSDd5XDpMMBieQ0EffaPDdZYhObQoBxscodYHISXmt76FaKy84ITzw08E2MvjqDa4ACx4Z3bho3uvaUeJhAzT6YSD9HyFyQrODN9B5ZiPK+HDACFRGfS+e/HADvUBU9ldqVkDsjneBAbPfwU=","signType":1,"timestamp":"1565856802518"}';
        $curl = new  CurlInterface(json_decode($data), 6);
        $result = $curl->execute("https://lmcontact.blackfish.cn/lmcontactfacade-web/contact/v1/callback", 'POST');
        $this->log($result);
        return $result;
    }


}