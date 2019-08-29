<?php

use backend\assets\LayUIAsset;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CertControllerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use kartik\grid\GridView;

LayUIAsset::register($this);

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
<blockquote class="layui-elem-quote"><?php echo $this->title; ?></blockquote>
<div class="iwu-cert-task-index">


    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'task_id',
            [
                'label' => '会员ID',
                'attribute' => 'user_id',
                'width' => '300px',
                'hAlign' => 'right'
            ],
//            'user_name',
            'mobile',
            [
                'label' => '身份证姓名',
                'attribute' => 'iwuCertOcr.ocr_name',
                'width' => '300px',
                'contentOptions' => function ($model) {
                    if (1) {
                        return ['style' => 'color: #b1a8a8'];
                    }
                },
            ],   [
                'label' => 'ocr有效期',
                'attribute' => 'iwuCertOcr.ocr_period',
                'width' => '300px',
            ],[
                'label' => 'ocr正面-认证状态',
                'attribute' => 'iwuCertOcr.font_status',
                'width' => '200px',
                'value' => function ($dataProvider) {
        // 0未认证 1认证成功  2认证失败
                    $status = [0 => '[0]未认证', 1 => '[1]认证成功',2=>'[2]认证失败'];
                    return $dataProvider->iwuCertOcr->font_status;
                },
                'format' => 'raw',
            ],[
                'label' => 'ocr反面-认证状态',
                'attribute' => 'iwuCertOcr.back_status',
                'width' => '200px',
//                'value' => function ($dataProvider) {
//                    // 0未认证 1认证成功  2认证失败
//                    $status = [0 => '[0]未认证', 1 => '[1]认证成功',2=>'[2]认证失败'];
//                    return $status[$dataProvider->font_status];
//                },
            ],
            //'email:email',
            'biz_type',
            'process_state',
            //'channel',
            'bill_state',
            'report_state',
            //'source',
            'message',
            //'add_time',
            //'update_time',
            //'del_flag',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
