<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm Api Order Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tlm-api-order-info-view">

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
            'lm_member_id',
            'user_name',
            'user_phone_no',
            'distributor_id',
            'tenant_company_id',
            'tenant_product_id',
            'source',
            'reloan',
            'order_no',
            'base_data_id',
            'base_data_hash',
            'supplement_data_id',
            'supplement_data_hash',
            'amount',
            'term',
            'term_unit',
            'total_repayment_amount',
            'total_arrival_amount',
            'interest_and_cost_amount',
            'activated',
            'finished',
            'distributor_statistics_valid',
            'status',
            'get_approval_result_times:datetime',
            'repush_base_times:datetime',
            'repush_supplement_times:datetime',
            'del_flag',
            'pre_apply_time',
            'apply_time',
            'add_time',
            'update_time',
            'p_value',
            'tag',
            'channel_tag',
            'repay_partial',
            'settle_status',
            'user_is_new',
            'user_is_all_channel_new',
            'is_extend_stage',
            'filter_flag',
            'taobao_token',
        ],
    ]) ?>

</div>
