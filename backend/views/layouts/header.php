<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\LayUIAsset;

LayUIAsset::register($this);
?>

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
            <!--                        --><?php //echo Yii::$app->user->identity->username ?>
        </a>
        <dl class="layui-nav-child">
            <dd><?= Html::a('修改密码', '/admin/personal/reset-password') ?></dd>
        </dl>
    </li>
    <li class="layui-nav-item">
        <?= Html::a('注销', '/site/logout', [
            'data' => [
                'method' => 'POST'
            ]
        ]) ?>
    </li>
</ul>
