<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserVerifyRecordSearch */
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
                <label class="layui-form-label">产品ID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'product_id')->textInput(['placeholder' => '请输入产品ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>

        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
