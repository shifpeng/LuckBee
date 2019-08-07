<?php


namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\AssetManager;

class LayUIAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets';
    public $css = [
        'layui-v2.5.4/layui/css/layui.css',
        'luckbee.css',
    ];
    public $js = [
        'layui-v2.5.4/layui/layui.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];

    //定义按需加载JS方法
    public static function addScript($view, $jsfile)
    {
        $AssetManager = new AssetManager();
        $jsfile = $AssetManager->getPublishedUrl('@backend/assets') . $jsfile;
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    //定义按需加载css方法
    public static function addCss($view, $cssfile)
    {
        $AssetManager = new AssetManager();
        $cssfile = $AssetManager->getPublishedUrl('@backend/assets') . $cssfile;
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }
}