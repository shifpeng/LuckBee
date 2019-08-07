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
        'pager' => [
            'firstPageLabel' => "首页",
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '尾页',
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'function_code',
            [
                'label' => '键',
                'attribute' => 'key_code',
                'width' => '100px',
            ],
            [
                'label' => '值',
                'attribute' => 'key_value',
                'width' => '100px',
            ],
            'result_code',
            'add_day',
            'add_time',
            [
                'label' => '入参',
                'attribute' => 'request_json',
                'width' => '20%',
            ],
            'response_json:ntext',


//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
