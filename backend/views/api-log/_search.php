<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ApiLogSearch */
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
                <label class="layui-form-label">方法名</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'function_code')->textInput(['placeholder' => '请输入方法名', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">键</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'key_code')->textInput(['placeholder' => '请输入键名', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">值</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'key_value')->textInput(['placeholder' => '请输入键值', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">请求体</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'request_json')->textInput(['placeholder' => '请输入请求体', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">响应体</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'response_json')->textInput(['placeholder' => '请输入响应体', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">添加日期</label>
                <div class="layui-input-inline">
                    <?php echo $form->field($model, 'add_day')->textInput(['placeholder' => '请输入添加日期', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline" style="float: right;margin-right: 300px;">
                <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
                <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
            </div>
        </div>

    </div>


    <?php // echo $form->field($model, 'response_json') ?>

    <?php // echo $form->field($model, 'result_code') ?>

    <?php // echo $form->field($model, 'add_day') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php ActiveForm::end(); ?>

</div>
