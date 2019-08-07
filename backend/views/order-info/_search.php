<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\OrderInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .layui-form-label {
        width: 120px;
    }
</style>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>
<div class="layui-row layui-inline">
    <div class="layui-form-item">
        <div class="layui-inline" style="margin-top:18px;">
            <div class="layui-inline">
                <label class="layui-form-label">会员ID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'lm_member_id')->textInput(['placeholder' => '请输入会员ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">用户姓名</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'user_name')->textInput(['placeholder' => '请输入用户姓名', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">订单号</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'order_no')->textInput(['placeholder' => '请输入订单号', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">产品ID</label>
                <div class="layui-input-inline">
                    <?php  echo $form->field($model, 'tenant_product_id')->textInput(['placeholder' => '请输入产品ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'tenant_company_id') ?>

    <?php // echo $form->field($model, 'tenant_product_id') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'reloan') ?>

    <?php // echo $form->field($model, 'order_no') ?>

    <?php // echo $form->field($model, 'base_data_id') ?>

    <?php // echo $form->field($model, 'base_data_hash') ?>

    <?php // echo $form->field($model, 'supplement_data_id') ?>

    <?php // echo $form->field($model, 'supplement_data_hash') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'term') ?>

    <?php // echo $form->field($model, 'term_unit') ?>

    <?php // echo $form->field($model, 'total_repayment_amount') ?>

    <?php // echo $form->field($model, 'total_arrival_amount') ?>

    <?php // echo $form->field($model, 'interest_and_cost_amount') ?>

    <?php // echo $form->field($model, 'activated') ?>

    <?php // echo $form->field($model, 'finished') ?>

    <?php // echo $form->field($model, 'distributor_statistics_valid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'get_approval_result_times') ?>

    <?php // echo $form->field($model, 'repush_base_times') ?>

    <?php // echo $form->field($model, 'repush_supplement_times') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'pre_apply_time') ?>

    <?php // echo $form->field($model, 'apply_time') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'p_value') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'channel_tag') ?>

    <?php // echo $form->field($model, 'repay_partial') ?>

    <?php // echo $form->field($model, 'settle_status') ?>

    <?php // echo $form->field($model, 'user_is_new') ?>

    <?php // echo $form->field($model, 'user_is_all_channel_new') ?>

    <?php // echo $form->field($model, 'is_extend_stage') ?>

    <?php // echo $form->field($model, 'filter_flag') ?>

    <?php // echo $form->field($model, 'taobao_token') ?>

    <?php ActiveForm::end(); ?>

</div>
