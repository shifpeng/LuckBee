<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IwuCertTask */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="iwu-cert-task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'process_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bill_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput() ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
