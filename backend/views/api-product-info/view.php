<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmfApiProductInfoContact */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lmf Api Product Info Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tlmf-api-product-info-contact-view">

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
            'product_id',
            'company_name',
            'product_name',
            'processor',
            'rsa_pri_key',
            'rsa_pub_key',
            'product_pub_key',
            'product_des_key',
            'remark',
            'del_flag',
            'add_time',
            'update_time',
            'verify_url:url',
            'push_base_url:url',
            'push_supplement_url:url',
            'get_card_list_url:url',
            'bind_card_sms_url:url',
            'bind_card_url:url',
            'get_approve_result_url:url',
            'approve_ensure_url:url',
            'approve_ensure_sms_url:url',
            'get_order_info_url:url',
            'get_agreement_info_url:url',
            'get_repay_plan_url:url',
            'repay_url:url',
            'repay_sms_url:url',
            'repay_detail_info_url:url',
            'calc_url:url',
            'extend_stage_detail_url:url',
            'do_extend_stage_url:url',
            'app_id',
            'bump_type',
            'can_repay_change_card',
            'support_banks',
            'term_to_time_num:datetime',
            'term_to_time_unit:datetime',
            'take_money_url:url',
            'open_account_url:url',
            'carrier_bill_type',
            'carrier_report_type',
            'push_info_confirm_url:url',
            'approve_ensure_extension_url:url',
            'loan_amount_period_url:url',
            'loan_calc_url:url',
            'loan_card_list_url:url',
            'loan_band_card_url:url',
            'loan_card_verification_url:url',
        ],
    ]) ?>

</div>
