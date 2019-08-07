<?php


namespace backend\controllers;


use backend\components\CurlInterface;
use backend\models\TLmfApiProductInfoContact;
use yii\web\Controller;

class UserProductBlacklistController extends Controller
{
    public function actionIndex()
    {
        $data = ['phoneNo' => 15252470969];
//        $tp->getAppName('');
        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $result,
        ]);
    }
}