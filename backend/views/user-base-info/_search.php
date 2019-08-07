<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserBaseInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .layui-form-label
    {
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
        <div  class="layui-inline" style="margin-top:18px;">
            <div class="layui-inline">
                <label class="layui-form-label">会员ID</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'lm_member_id')->textInput(['placeholder' => '请输入会员ID', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">用户姓名</label>
                <div class="layui-input-inline">
                    <?= $form->field($model, 'user_name') ->textInput(['placeholder' => '请输入用户姓名', 'style' => 'width:200px;'])->label(false)->error(false) ?>
                </div>
            </div>

        </div>
        <div class="layui-inline">
            <?= Html::submitButton('&emsp;查&nbsp;&nbsp;询&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-sm']) ?>
            <?= Html::resetButton('&emsp;重&emsp;置&emsp;', ['class' => 'layui-btn layui-btn-radius layui-btn-primary layui-btn-sm']) ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'education_level') ?>

    <?php // echo $form->field($model, 'social_security') ?>

    <?php // echo $form->field($model, 'vehicle_ownership') ?>

    <?php // echo $form->field($model, 'work_type') ?>

    <?php // echo $form->field($model, 'operating_income') ?>

    <?php // echo $form->field($model, 'operating_years') ?>

    <?php // echo $form->field($model, 'monthly_income') ?>

    <?php // echo $form->field($model, 'work_years') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php ActiveForm::end(); ?>

</div>
