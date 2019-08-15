<?php


namespace backend\controllers;


use common\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BaseController  extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function log($msg)
    {
        $dir = __DIR__ . "/../runtime/logs/";
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $filename = $dir . date('Y-m-d') . '.log';
        $need_chmod = file_exists($filename);
        file_put_contents($filename, "【" . date("Y-m-d H:i:s") . "】" . $msg . PHP_EOL, FILE_APPEND);
        if ($need_chmod == false) {
            @chmod($filename, 0777);
        }
    }
}