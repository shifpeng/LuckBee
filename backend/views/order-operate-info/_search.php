<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\OrderOperateInfoSearch */
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
                <label class="layui-form-label">订单号</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'order_no')->textInput(['placeholder' => '请输入订单号', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">会员ID</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'lm_member_id')->textInput(['placeholder' => '请输入公司名称', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">产品ID</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'product_id')->textInput(['placeholder' => '请输入公司名称', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'lm_member_id') ?>

    <?php // echo $form->field($model, 'user_filter_status') ?>

    <?php // echo $form->field($model, 'user_filter_times') ?>

    <?php // echo $form->field($model, 'pre_apply_status') ?>

    <?php // echo $form->field($model, 'pre_apply_times') ?>

    <?php // echo $form->field($model, 'apply_status') ?>

    <?php // echo $form->field($model, 'apply_times') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'if_batch_push') ?>

    <?php // echo $form->field($model, 'user_filter_reason') ?>

    <?php ActiveForm::end(); ?>

</div>
