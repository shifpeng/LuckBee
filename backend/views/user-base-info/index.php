<?php

use backend\assets\LayUIAsset;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

LayUIAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserBaseInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */


$this->title = '用户基本信息';
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
        'rowOptions' => function ($model) {
            return ['style' => 'word-break: break-all'];
        },
        'pager' => [
            'firstPageLabel' => "首页",
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '尾页',
        ],
        'columns' => [
//            'id',
            'lm_member_id',
            'user_name',
//            'id_card_no',
//            'max_monthly_repayment',
            //'education_level',
            //'social_security',
            //'vehicle_ownership',
            //'work_type',
            //'operating_income',
            //'operating_years',
            //'monthly_income',
            //'work_years',
            'ip',
            //'location',
            //'del_flag',
//            'source', //-1
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
            [
                'label' => '状态',
                'attribute' => 'status',
                'width' => '120px',
                'value' => function ($dataProvider) {
                    $status = [1 => '有效', 0 => '无效'];
                    return isset($status[$dataProvider->status]) ? $status[$dataProvider->status] : '';
                },
            ],
//            'status',
            'add_time',
            'update_time',
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '200px',
                'template' => '{button1}',
                'header' => '操作',
                'buttons' => ['button1' => function ($url, $model, $key) {
                    $label = '删除所有订单信息';
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
                'template' => '{button1}',
                'header' => '操作',
                'buttons' => ['button1' => function ($url, $model, $key) {
                    $label = '删除所有数据';
                    $options = [
                        'class' => 'layui-btn layui-btn-sm',
                        'data-pjax' => '0',
                        'onclick' => " zNewWin('',\"/motorcade/customer/update-customer?id=$model->id&op=review\",169,181)"
                    ];
                    return Html::button($label, $options);
                }]
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
