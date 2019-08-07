<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tlm-api-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'function_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_json')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'response_json')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'result_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
