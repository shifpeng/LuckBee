<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmfApiProductInfoContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlmf-api-product-info-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'processor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rsa_pri_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rsa_pub_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_pub_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_des_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'verify_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'push_base_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'push_supplement_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_card_list_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bind_card_sms_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bind_card_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_approve_result_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approve_ensure_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approve_ensure_sms_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_order_info_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_agreement_info_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_repay_plan_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repay_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repay_sms_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repay_detail_info_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calc_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extend_stage_detail_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'do_extend_stage_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bump_type')->textInput() ?>

    <?= $form->field($model, 'can_repay_change_card')->textInput() ?>

    <?= $form->field($model, 'support_banks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'term_to_time_num')->textInput() ?>

    <?= $form->field($model, 'term_to_time_unit')->textInput() ?>

    <?= $form->field($model, 'take_money_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_account_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carrier_bill_type')->textInput() ?>

    <?= $form->field($model, 'carrier_report_type')->textInput() ?>

    <?= $form->field($model, 'push_info_confirm_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approve_ensure_extension_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_amount_period_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_calc_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_card_list_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_band_card_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_card_verification_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
