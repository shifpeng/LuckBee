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
                [
                    'label' => '产品ID',
                    'attribute' => 'product_id',
                    'width' => '100px',
                ], [
                    'label' => 'app_id',
                    'attribute' => 'app_id',
                    'width' => '200px',
                ],

                [
                    'label' => '产品名称',
                    'attribute' => 'product_name',
                    'width' => '300px',
                ],
                [
                    'label' => '公钥',
                    'attribute' => 'rsa_pub_key',
                    'width' => '650px',
                    'value' => function ($model) {
                        return str_replace(' ', '', $model->rsa_pub_key);
                    }

                ],
//            [
//                'label' => '机构公钥',
//                'attribute' => 'product_pub_key',
//                'width' => '200px',
//            ],
                [
                    'label' => '公司名称',
                    'attribute' => 'company_name',
                    'width' => '350px',
                ],
                [
                    'label' => '添加时间',
                    'attribute' => 'add_time',
                    'width' => '300px',
                ],
                [
                    'label' => '更新时间',
                    'attribute' => 'update_time',
                    'width' => '300px',
                ],
//                '',
//                ''
//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>