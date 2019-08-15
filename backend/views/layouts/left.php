<?php

use yii\helpers\Url;
use backend\assets\LayUIAsset;

LayUIAsset::register($this);
?>

<div class="layui-side-scroll">
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="demo" style="margin-right: 10px;">
        <!--                --><?php //foreach ($this->context->leftMenu as $item):?>
<!--        <li class="layui-nav-item layui-nav-itemed">-->
<!--            <a class="" href="javascript:;">--><?//= "测试环境" ?><!--</a>-->
<!--            <dl class="layui-nav-child" style="margin-bottom: 0px;">-->
<!--                <!--                            -->--><?php ////foreach ($item['items'] as $child):?>
<!--                <dd><a href="--><?//= Url::toRoute("api-product-info/index") ?><!--">--><?//= "商户产品信息" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("user-base-info/index") ?><!--">--><?//= "用户基本信息" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("user-verify-record/index") ?><!--">--><?//= "撞库记录" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("order-info/index") ?><!--">--><?//= "订单基本信息" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("order-operate-info/index") ?><!--">--><?//= "一推二推信息" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("api-log/index") ?><!--">--><?//= "对接门面请求日志" ?><!--</a></dd>-->
<!--                <dd><a href="--><?//= Url::toRoute("user-product-blacklist/index") ?><!--">--><?//= "用户产品黑名单" ?><!--</a></dd>-->
<!--                <!--                            -->--><?php ////endforeach;?>
<!--            </dl>-->
<!--        </li>-->
        <li class="layui-nav-item  layui-nav-itemed">
            <a class="" href="javascript:;"><?= "生产环境" ?></a>
            <dl class="layui-nav-child">
                <!--                            --><?php //foreach ($item['items'] as $child):?>
                <dd><a href="<?= Url::toRoute("api-product-info/search") ?>"><?= "商户产品信息" ?></a></dd>
                <dd><a href="<?= Url::toRoute("user-base-info/search") ?>"><?= "用户基本信息" ?></a></dd>
                <dd><a href="<?= Url::toRoute("user-verify-record/search") ?>"><?= "撞库记录" ?></a></dd>
                <dd><a href="<?= Url::toRoute("order-info/search") ?>"><?= "订单基本信息" ?></a></dd>
                <dd><a href="<?= Url::toRoute("order-operate-info/search") ?>"><?= "一推二推信息" ?></a></dd>
<!--                <dd><a href="--><?//= Url::toRoute("api-log/search") ?><!--">--><?//= "对接门面请求日志" ?><!--</a></dd>-->
                <!--                        <dd ><a  href="-->
                <? //= Url::toRoute("api-product-info/index") ?><!--">--><? //= "商户产品信息" ?><!--</a></dd>-->
                <!--                            --><?php //endforeach;?>
            </dl>
        </li>
        <!--                --><?php //endforeach;?>
    </ul>
</div>

