<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ApiLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '接口请求日志';
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
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'label' => '方法名',
                'attribute' => 'function_code',
                'width' => '200px',
            ],
//            'function_code',
            [
                'label' => '键',
                'attribute' => 'key_code',
                'width' => '200px',
            ],
            [
                'label' => '值',
                'attribute' => 'key_value',
                'width' => '200px',
            ],
            [
                'label' => '结果码',
                'attribute' => 'result_code',
                'width' => '80px',
            ],
//            [
//                'label' => '添加日期',
//                'attribute' => 'add_day',
//                'width' => '100px',
//            ],
            [
                'label' => '添加时间',
                'attribute' => 'add_time',
                'width' => '170px',
            ],
            [
                'label' => '入参',
                'attribute' => 'request_json',
                'width' => '1300px',
            ],
            [
                'label' => '返参',
                'attribute' => 'response_json',
                'width' => '400px',
            ],
//            'response_json:ntext',


//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
