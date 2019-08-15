<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\assets\LayUIAsset;
use yii\widgets\Pjax;

LayUIAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderOperateInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */


$this->title = '一推二推信息';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pagination {
        position: fixed;
        bottom: -17px;
        width: 100%;
        padding: 19px 19px 19px 22px;
        background-color: #fff;
        height: 70px;
    }
</style>
<div class="">

    <!--    <h1>--><?php //echo Html::encode($this->title) ?><!--</h1>-->

    <p>
        <!--        --><?php //echo Html::a('Create T Lmf Api Product Info Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel, 'env' => $env]); ?>


    <div class="layui-form" style="padding: 10px;">
        <?= GridView::widget([
            'id' => 'grid-view-list',
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'floatHeader' => true,
            'resizableColumns' => false,
            'tableOptions' => ['class' => 'layui-table', 'lay-skin' => "row"],
            'emptyText' => '没有匹配的记录',
            'showPageSummary' => false,
            'summary' => '',
            'pager' => [
                'firstPageLabel' => "首页",
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'lastPageLabel' => '尾页',
            ],
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => '产品ID',
                    'attribute' => 'product_id',
                    'width' => '100px',
                ],
//                'product_id',
//            'id',
                [
                    'label' => '订单号',
                    'attribute' => 'order_no',
                    'width' => '200px',
                ],
//                'order_no',
//            'del_flag',
//                'add_time',
                [
                    'label' => '创建时间',
                    'attribute' => 'add_time',
                    'width' => '250px',
                ],
                [
                    'label' => '更新时间',
                    'attribute' => 'update_time',
                    'width' => '250px',
                ],
//                'update_time',
                [
                    'label' => '会员ID',
                    'attribute' => 'lm_member_id',
                    'width' => '350px',
                ],
                [
                    'label' => '用户过滤',
                    'attribute' => 'user_filter_status',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [0 => '不需要', 1 => "需要", 2 => "审核成功", 3 => "审核失败"];
                        return isset($status[$dataProvider->user_filter_status]) ? $status[$dataProvider->user_filter_status] : '';
                    },
                ],
//            'user_filter_status',

//                'user_filter_times',
                [
                    'label' => '过滤次数',
                    'attribute' => 'user_filter_times',
                    'width' => '200px',
                ],
                [
                    'label' => '一推状态',
                    'attribute' => 'pre_apply_status',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [0 => '不需要', 1 => "需要", 2 => "成功", 3 => "失败"];
                        return isset($status[$dataProvider->pre_apply_status]) ? $status[$dataProvider->pre_apply_status] : '';
                    },
                ],

//            'pre_apply_status',
//                'pre_apply_times',
                [
                    'label' => '一推次数',
                    'attribute' => 'pre_apply_times',
                    'width' => '200px',
                ],
                [
                    'label' => '二推状态',
                    'attribute' => 'apply_status',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [0 => '不需要', 1 => "需要", 2 => "成功", 3 => "失败"];
                        return isset($status[$dataProvider->pre_apply_status]) ? $status[$dataProvider->apply_status] : '';
                    },
                ],
//            'apply_status',
                [
                    'label' => '二推次数',
                    'attribute' => 'apply_times',
                    'width' => '200px',
                ],
//                'apply_times',
                [
                    'label' => '来源',
                    'attribute' => 'source',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [0 => '小黑鱼 h5', 1 => '白鲸信用 app', '' => '', 2 => "未知来源 h5", 3 => "甲乙方: 急用钱 app", 4 => "小白鲸 h5", 5 => "白鲸查查 h5", 6 => "白鲸贷", 7 => "万能钱包", 9 => '阿拉丁钱包',
                            100 => "快拿钱", 101 => '掌上小财', 102 => '全民现金', 103 => '拿钱快', 104 => '花不完', 105 => "爆米花", 106 => '拿钱花', 107 => '每周花', 108 => ' 有借有还', 109 => '闪电下', 110 => '叮当有米',
                            111 => '鲨鱼闪贷', 112 => '闪钱包', 500 => '财神急救', 501 => '好财运', -1 => '老数据 未知'];
                        return isset($status[$dataProvider->source]) ? $status[$dataProvider->source] : '';
                    },
                ],
//            'source',

//            'if_batch_push',
                [
                    'label' => '过滤失败原因',
                    'attribute' => 'user_filter_reason',
                    'width' => '350px',
                ],
//            [
//                'header' => '一推',
//                'hAlign' => 'center',
//                'width' => '150px',
//                'class' => 'kartik\grid\ActionColumn',
//                'template' => '{agelimitset}',
//                'visible' => function ($dataProvider) {
//                    return ($dataProvider->pre_apply_status == 2 || $dataProvider->pre_apply_status == 0) ? false : true;
//                },
//                'buttons' => [
//                    'agelimitset' => function ($model) {
//                        return Html::a('<span>重新一推</span>', Yii::$app->urlManager->createUrl(['order/invoice/update', 'id' => $model->id]), [
//                            'title' => '更改信息',
//                        ]);
//                    },
//                ],
//            ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '200px',
                    'template' => '{button1}',
                    'visible' => $env != 'pro',
                    'header' => '操作',
                    'buttons' => ['button1' => function ($url, $model, $key) {
                        $label = '重新一推';
                        $options = [
                            'class' => 'layui-btn layui-btn-sm',
                            'data-pjax' => '0',
                            'onclick' => " zNewWin('',\"/motorcade/customer/update-customer?id=$model->id&op=review\",169,181)"
                        ];
                        return Html::button($label, $options);
                    }]
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '200px',
                    'visible' => $env != 'pro',
                    'template' => '{button1}',
                    'header' => '操作',
                    'buttons' => ['button1' => function ($url, $model, $key) {
                        $label = '重新二推';
                        $options = [
                            'class' => 'layui-btn layui-btn-warm layui-btn-sm',
                            'data-pjax' => '0',
                            'onclick' => " zNewWin('',\"/motorcade/customer/update-customer?id=$model->id&op=review\",169,181)"
                        ];
                        return Html::button($label, $options);
                    }]
                ]
//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
    <?php Pjax::end(); ?>

</div>
