<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlm-api-order-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lm_member_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distributor_id')->textInput() ?>

    <?= $form->field($model, 'tenant_company_id')->textInput() ?>

    <?= $form->field($model, 'tenant_product_id')->textInput() ?>

    <?= $form->field($model, 'source')->textInput() ?>

    <?= $form->field($model, 'reloan')->textInput() ?>

    <?= $form->field($model, 'order_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_data_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_data_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supplement_data_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supplement_data_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'term')->textInput() ?>

    <?= $form->field($model, 'term_unit')->textInput() ?>

    <?= $form->field($model, 'total_repayment_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_arrival_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interest_and_cost_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activated')->textInput() ?>

    <?= $form->field($model, 'finished')->textInput() ?>

    <?= $form->field($model, 'distributor_statistics_valid')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'get_approval_result_times')->textInput() ?>

    <?= $form->field($model, 'repush_base_times')->textInput() ?>

    <?= $form->field($model, 'repush_supplement_times')->textInput() ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'pre_apply_time')->textInput() ?>

    <?= $form->field($model, 'apply_time')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'p_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repay_partial')->textInput() ?>

    <?= $form->field($model, 'settle_status')->textInput() ?>

    <?= $form->field($model, 'user_is_new')->textInput() ?>

    <?= $form->field($model, 'user_is_all_channel_new')->textInput() ?>

    <?= $form->field($model, 'is_extend_stage')->textInput() ?>

    <?= $form->field($model, 'filter_flag')->textInput() ?>

    <?= $form->field($model, 'taobao_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
