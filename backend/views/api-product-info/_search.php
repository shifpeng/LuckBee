<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ApiProductInfoSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $env string */
?>
<style>
    .layui-form-label {
        width: 120px;
    }
</style>
<?php
$str = $env == 'pro' ? 'search' : 'index';
?>
<?php $form = ActiveForm::begin([
    'action' => [$str],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>
<div class="layui-row layui-inline">
    <div class="layui-form-item">
        <div class="layui-inline" style="margin-top:18px;">
            <div class="layui-inline">
                <label class="layui-form-label">产品ID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'product_id')->textInput(['placeholder' => '请输入产品ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">公司名称</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'company_name')->textInput(['placeholder' => '请输入公司名称', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">产品名称</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'product_name')->textInput(['placeholder' => '请输入产品名称', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">appID</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'app_id')->textInput(['placeholder' => '请输入appID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>

        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'rsa_pri_key') ?>

    <?php // echo $form->field($model, 'rsa_pub_key') ?>

    <?php // echo $form->field($model, 'product_pub_key') ?>

    <?php // echo $form->field($model, 'product_des_key') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'verify_url') ?>

    <?php // echo $form->field($model, 'push_base_url') ?>

    <?php // echo $form->field($model, 'push_supplement_url') ?>

    <?php // echo $form->field($model, 'get_card_list_url') ?>

    <?php // echo $form->field($model, 'bind_card_sms_url') ?>

    <?php // echo $form->field($model, 'bind_card_url') ?>

    <?php // echo $form->field($model, 'get_approve_result_url') ?>

    <?php // echo $form->field($model, 'approve_ensure_url') ?>

    <?php // echo $form->field($model, 'approve_ensure_sms_url') ?>

    <?php // echo $form->field($model, 'get_order_info_url') ?>

    <?php // echo $form->field($model, 'get_agreement_info_url') ?>

    <?php // echo $form->field($model, 'get_repay_plan_url') ?>

    <?php // echo $form->field($model, 'repay_url') ?>

    <?php // echo $form->field($model, 'repay_sms_url') ?>

    <?php // echo $form->field($model, 'repay_detail_info_url') ?>

    <?php // echo $form->field($model, 'calc_url') ?>

    <?php // echo $form->field($model, 'extend_stage_detail_url') ?>

    <?php // echo $form->field($model, 'do_extend_stage_url') ?>

    <?php // echo $form->field($model, 'app_id') ?>

    <?php // echo $form->field($model, 'bump_type') ?>

    <?php // echo $form->field($model, 'can_repay_change_card') ?>

    <?php // echo $form->field($model, 'support_banks') ?>

    <?php // echo $form->field($model, 'term_to_time_num') ?>

    <?php // echo $form->field($model, 'term_to_time_unit') ?>

    <?php // echo $form->field($model, 'take_money_url') ?>

    <?php // echo $form->field($model, 'open_account_url') ?>

    <?php // echo $form->field($model, 'carrier_bill_type') ?>

    <?php // echo $form->field($model, 'carrier_report_type') ?>

    <?php // echo $form->field($model, 'push_info_confirm_url') ?>

    <?php // echo $form->field($model, 'approve_ensure_extension_url') ?>

    <?php // echo $form->field($model, 'loan_amount_period_url') ?>

    <?php // echo $form->field($model, 'loan_calc_url') ?>

    <?php // echo $form->field($model, 'loan_card_list_url') ?>

    <?php // echo $form->field($model, 'loan_band_card_url') ?>

    <?php // echo $form->field($model, 'loan_card_verification_url') ?>


</div>
<?php ActiveForm::end(); ?>

