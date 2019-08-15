<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\Breadcrumbs;

use backend\assets\LayUIAsset;

LayUIAsset::register($this);

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    ?>
    <?= $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/assets/layui-v2.5.4/layui');
    ?>
    <?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <?php $this->beginBody() ?>
    <body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>
        </div>
        <div class="layui-side layui-bg-black">
            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>
        </div>
        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div class="layui-row">
                <div class="layui-col-xs12">
                    <div class="layui-card admin-breadcrumb">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => 'layui-breadcrumb'],
                            'tag' => 'span',
                            'homeLink' => [
                                'label' => '首页',                  // required
                                'url' => '/',                      // optional, will be processed by Url::to()
                                'template' => "{link}\n", // optional, if not set $this->itemTemplate will be used
                            ],
                            'itemTemplate' => "{link}\n",
                            'activeItemTemplate' => "<a><cite>{link}</cite></a>\n"
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="layui-row admin-content">
                <div class="layui-col-xs12">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            layui.use('element', function () {
                var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

                //监听导航点击
                element.on('nav(demo)', function (elem) {
                    // alert(elem.text());
                    console.log(elem)
                    // elem.text()
                    // debugger
                    // layer.msg();
                });

            });
        }
    </script>
    </body>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>
<?php } ?>
