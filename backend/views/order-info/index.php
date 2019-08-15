<?php

use backend\assets\LayUIAsset;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

LayUIAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */


$this->title = '订单基本信息';
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
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'label' => '会员ID',
                'attribute' => 'lm_member_id',
                'width' => '300px',
            ], [
                'label' => '用户姓名',
                'attribute' => 'user_name',
                'width' => '100px',
            ],
//            'user_name',
//            'user_phone_no',
//            'distributor_id',
            //'tenant_company_id',
            [
                'label' => '产品ID',
                'attribute' => 'tenant_product_id',
                'width' => '100px',
            ],
//            '',
//            'source',
            //'reloan',
            [
                'label' => '订单号',
                'attribute' => 'order_no',
                'width' => '250px',
            ],
//            'order_no',
            [
                'label' => '数据ID',
                'attribute' => 'base_data_id',
                'width' => '250px',
            ],
//            'base_data_id',
            //'base_data_hash',
            //'supplement_data_id',
            //'supplement_data_hash',
            //'amount',
            //'term',
            //'term_unit',
            //'total_repayment_amount',
            //'total_arrival_amount',
            //'interest_and_cost_amount',
            //'activated',
            //'finished',
            //'distributor_statistics_valid',
//            'status',
            [
                'label' => '状态',
                'attribute' => 'status',
                'width' => '320px',
                'value' => function ($dataProvider) {
                    $status = [0 => '未知状态', 1 => '预申请', 2 => "一推已推送", 100 => '资料填写完成, 订单已创建 ', 200 => '订单已推送, 审批授信中', 300 => '审批授信通过', 910 => '审批授信未通过(及时)',
                        911 => '审批授信未通过(回调)', 912 => '审批授信未通过(查询) ', 400 => '待开户', 410 => '待提款', 420 => '收款审核中', 500 => '放款成功', 920 => '放款失败', 600 => '订单整体还款中', 610 => '本期待还款',
                        611 => '本期还款中', 612 => '本期已结清', 613 => '本期还款失败', 700 => '逾期', 900 => '订单已完成 - 贷款取消', 990 => '订单已完成 - 贷款结清'];
                    return "【" . $dataProvider->status . "】-" . (isset($status[$dataProvider->status]) ? $status[$dataProvider->status] : '');
                },
            ],
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
            //'get_approval_result_times:datetime',
            //'repush_base_times:datetime',
            //'repush_supplement_times:datetime',
            //'del_flag',
            [
                'label' => '一推时间',
                'attribute' => 'pre_apply_time',
                'width' => '200px',
            ],
            [
                'label' => '二推时间',
                'attribute' => 'apply_time',
                'width' => '200px',
            ],
            [
                'label' => '创建时间',
                'attribute' => 'add_time',
                'width' => '200px',
            ],
            [
                'label' => '更新时间',
                'attribute' => 'update_time',
                'width' => '200px',
            ],
            //'p_value',
            //'tag',
            //'channel_tag',
            //'repay_partial',
            //'settle_status',
            //'user_is_new',
            //'user_is_all_channel_new',
            //'is_extend_stage',
            //'filter_flag',
            //'taobao_token',
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '200px',
                'template' => '{button1}',
                'visible' => $env != 'pro',
                'header' => '操作',
                'buttons' => ['button1' => function ($url, $model, $key) {
                    $label = '删除订单信息';
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

