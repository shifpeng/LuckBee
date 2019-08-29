<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CertControllerSearch */
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
                <label class="layui-form-label">taskID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'task_id')->textInput(['placeholder' => '请输入taskID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>


            <div class="layui-inline">
                <label class="layui-form-label">会员ID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'user_id')->textInput(['placeholder' => '请输入会员ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'mobile')->textInput(['placeholder' => '请输入手机号码', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <?php // echo $form->field($model, 'email') ?>

            <?php // echo $form->field($model, 'biz_type') ?>

            <?php // echo $form->field($model, 'process_state') ?>

            <?php // echo $form->field($model, 'channel') ?>

            <?php // echo $form->field($model, 'bill_state') ?>

            <?php // echo $form->field($model, 'report_state') ?>

            <?php // echo $form->field($model, 'source') ?>

            <?php // echo $form->field($model, 'message') ?>

            <?php // echo $form->field($model, 'add_time') ?>

            <?php // echo $form->field($model, 'update_time') ?>

            <?php // echo $form->field($model, 'del_flag') ?>
        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
