<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderOperateConfigInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm Api Order Operate Config Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tlm-api-order-operate-config-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_no',
            'del_flag',
            'add_time',
            'update_time',
            'lm_member_id',
            'user_filter_status',
            'user_filter_times:datetime',
            'pre_apply_status',
            'pre_apply_times:datetime',
            'apply_status',
            'apply_times:datetime',
            'source',
            'product_id',
            'if_batch_push',
            'user_filter_reason',
        ],
    ]) ?>

</div>
