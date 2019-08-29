<?php

use backend\assets\LayUIAsset;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

//use yii\grid\GridView;

LayUIAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserProductBlacklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */
/* @var $other_info array */

$this->title = '用户产品黑名单';
//$this->params['breadcrumbs'][] = $this->title;
$other_info=isset($other_info['data'])?$other_info['data']:[];
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
<blockquote class="layui-elem-quote"><?php echo $this->title; ?></blockquote>
<div class="">
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
            'rowOptions' => function ($model) {
                return ['style' => 'word-break: break-all'];
            },
            'summary' => '',
            'pager' => [
                'firstPageLabel' => "首页",
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'lastPageLabel' => '尾页',
            ],
            'columns' => [
//                [
//                    'width' => '49px',
//                    'class' => 'kartik\grid\SerialColumn',
//                ],
                [
                    'label' => '产品ID',
                    'attribute' => 'product_id',
                    'width' => '80px',
                ], [
                    'label' => 'app_id',
                    'attribute' => 'app_id',
                    'width' => '190px',
                ],

                [
                    'label' => '产品名称',
                    'attribute' => 'product_name',
                    'width' => '200px',
                ],
                [
                    'label' => '公司名称',
                    'attribute' => 'company_name',
                    'width' => '200px',
                ],
                [
                    'label' => '撞库失败原因',
                    'attribute' => 'add_time',
                    'width' => '150px',
                    'value' => function ($model) use ($other_info){
                        $status = [1 => '成功', 2 => '失败[机构返回]',3=>'冷却[审批拒绝、放款失败]',4=>'撞库超时、异常',5=>'筛选项过滤'];
                        return isset($status[$other_info[$model->product_id]['status']]) ? $status[$other_info[$model->product_id]['status']] : '';;
                    }
                ],     [
                    'label' => '撞库记录失效时间',
                    'attribute' => 'add_time',
                    'width' => '150px',
                    'value' => function ($model) use ($other_info){
                        return $other_info[$model->product_id]['expireTime'];
                    }
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' => '200px',
                    'template' => '{button1}',
                    'header' => '操作',
                    'visible' => $env != 'pro',
                    'buttons' => ['button1' => function ($url, $model, $key) {
                        $label = '移除redis数据';
                        $options = [
                            'class' => 'layui-btn layui-btn-sm',
                            'data-pjax' => '0',
                            'onclick' => ""
                        ];
                        return Html::button($label, $options);
                    }]
                ],
//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
