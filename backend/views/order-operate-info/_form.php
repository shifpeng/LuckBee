<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderOperateConfigInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlm-api-order-operate-config-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'lm_member_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_filter_status')->textInput() ?>

    <?= $form->field($model, 'user_filter_times')->textInput() ?>

    <?= $form->field($model, 'pre_apply_status')->textInput() ?>

    <?= $form->field($model, 'pre_apply_times')->textInput() ?>

    <?= $form->field($model, 'apply_status')->textInput() ?>

    <?= $form->field($model, 'apply_times')->textInput() ?>

    <?= $form->field($model, 'source')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'if_batch_push')->textInput() ?>

    <?= $form->field($model, 'user_filter_reason')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
