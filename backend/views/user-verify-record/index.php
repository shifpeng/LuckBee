<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserVerifyRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */


$this->title = '撞库记录';
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
            'rowOptions' => function ($model) {
                return ['style' => 'word-break: break-all'];
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
                'lm_member_id',
                'product_id',
                'operate_time',

                [
                    'label' => '状态',
                    'attribute' => 'status',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [0 => '不可申请', 1 => '可申请', 2 => "可复贷", '3' => '撞库出错', 4 => '撞库超时', 5 => 'FSP超时',21=>'用户基本信息不存在'];
                        return isset($status[$dataProvider->status]) ? $status[$dataProvider->status] : '';
                    },
                ],
                [
                    'label' => '状态类型',
                    'attribute' => 'status_type',
                    'width' => '220px',
                    'value' => function ($dataProvider) {
                        $status = [1 => '业务正常', 2 => "业务异常", '3' => '商户异常', 4 => 'FSP异常'];
                        return isset($status[$dataProvider->status_type]) ? $status[$dataProvider->status_type] : '';
                    },
                ],
//            'status_type',
                'reason',
                //'del_flag',
                'add_time',
                'update_time',

            ],
        ]); ?>
        <?php Pjax::end(); ?>

    </div>
</div>
