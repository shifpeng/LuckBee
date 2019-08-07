<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserBaseInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlm-user-base-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lm_member_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_monthly_repayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_level')->textInput() ?>

    <?= $form->field($model, 'social_security')->textInput() ?>

    <?= $form->field($model, 'vehicle_ownership')->textInput() ?>

    <?= $form->field($model, 'work_type')->textInput() ?>

    <?= $form->field($model, 'operating_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operating_years')->textInput() ?>

    <?= $form->field($model, 'monthly_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_years')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'source')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
