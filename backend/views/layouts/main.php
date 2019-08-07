<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\Breadcrumbs;

use backend\assets\LayUIAsset as LayUIAssetAlias;

LayUIAssetAlias::register($this);
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
    <body>
    <?php $this->beginBody() ?>

    <body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo"> LuckBee 后台管理系统</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <!--            --><?php //foreach ($this->context->topMenu as $item):?>
                <!--                <li class="layui-nav-item --><? //= $item['active'] ? 'layui-this' : '' ?><!--">-->
                <? //= Html::a($item['label'],$item['url'],[
                //                        'data' => [
                //                            'method' => 'post'
                //                        ]
                //                    ])?><!--</li>-->
                <!--            --><?php //endforeach;?>
            </ul>
            <ul class=" layui-nav layui-layout-right
            ">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <?= Yii::$app->user->identity->username ?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><?= Html::a('修改密码', '/admin/personal/reset-password') ?></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <?= Html::a('注销', '/site/logout', [
                        'data' => [
                            'method' => 'post'
                        ]
                    ]) ?>
                </li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree">
                    <!--                --><?php //foreach ($this->context->leftMenu as $item):?>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;"><?= "测试环境" ?></a>
                        <dl class="layui-nav-child">
                            <!--                            --><?php //foreach ($item['items'] as $child):?>
                            <dd><a href="<?= Url::toRoute("api-product-info/index") ?>"><?= "商户产品信息" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("user-base-info/index") ?>"><?= "用户基本信息" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("user-verify-record/index") ?>"><?= "撞库记录" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("order-info/index") ?>"><?= "订单基本信息" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("order-operate-info/index") ?>"><?= "一推二推信息" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("api-log/index") ?>"><?= "对接门面请求日志" ?></a></dd>
                            <dd><a href="<?= Url::toRoute("user-product-blacklist/index") ?>"><?= "用户产品黑名单" ?></a></dd>
                            <!--                            --><?php //endforeach;?>
                        </dl>
                    </li>
<!--                    <li class="layui-nav-item">-->
<!--                        <a class="" href="javascript:;">--><?//= "生产环境" ?><!--</a>-->
<!--                        <dl class="layui-nav-child">-->
<!--                            <!--                            -->--><?php ////foreach ($item['items'] as $child):?>
<!--                            <dd><a href="--><?//= Url::toRoute("api-product-info/search") ?><!--">--><?//= "商户产品信息" ?><!--</a></dd>-->
<!--                            <dd><a href="--><?//= Url::toRoute("user-base-info/search") ?><!--">--><?//= "用户基本信息" ?><!--</a></dd>-->
<!--                            <dd><a href="--><?//= Url::toRoute("user-verify-record/search") ?><!--">--><?//= "撞库记录" ?><!--</a></dd>-->
<!--                            <dd><a href="--><?//= Url::toRoute("order-info/search") ?><!--">--><?//= "订单基本信息" ?><!--</a></dd>-->
<!--                            <dd><a href="--><?//= Url::toRoute("order-operate-info/search") ?><!--">--><?//= "一推二推信息" ?><!--</a></dd>-->
<!--                            <!--                        <dd ><a  href="-->-->
<!--                            --><?// //= Url::toRoute("api-product-info/index") ?><!--<!--">-->--><?// //= "商户产品信息" ?><!--<!--</a></dd>-->-->
<!--                            <!--                            -->--><?php ////endforeach;?>
<!--                        </dl>-->
<!--                    </li>-->
                    <!--                --><?php //endforeach;?>
                </ul>
            </div>
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
    <?php $this->endBody() ?>
    <script>
        layui.use('element', function () {
            var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

            //监听导航点击
            element.on('nav(demo)', function (elem) {
                //console.log(elem)
                layer.msg(elem.text());
            });
        });
    </script>
    </body>
    </html>
<?php $this->endPage() ?>