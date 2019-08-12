<?php

use backend\assets\LayUIAsset;
use backend\components\zGridView;
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;

LayUIAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ApiProductInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $env string */

$this->title = '商户产品信息';
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
//                    'headerOptions' => ['style' => 'display: flex;flex-shrink: 0;word-break: break-all;'],
                    'label' => '产品公钥',
                    'attribute' => 'rsa_pub_key',
                    'width' => '550px',
                    'value' => function ($model) {
                        $qian = array(" ", "　", "\t", "\n", "\r");
                        return str_replace($qian, '', $model->rsa_pub_key);
                    }

                ],
                [
                    'label' => '机构公钥',
                    'attribute' => 'product_pub_key',
                    'width' => '600px',
                ],
                [
                    'label' => '公司名称',
                    'attribute' => 'company_name',
                    'width' => '200px',
                ],
                [
                    'label' => '添加时间',
                    'attribute' => 'add_time',
                    'width' => '150px',
                ],
                [
                    'label' => '更新时间',
                    'attribute' => 'update_time',
                    'width' => '150px',
                ],
//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>