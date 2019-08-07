<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <blockquote class="layui-elem-quote layui-text">
        欢迎访问后台管理系统
    </blockquote>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>登录</legend>
    </fieldset>

    <form class="form-horizontal" th:action="@{/login}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">输入框</label>
            <div class="layui-input-block">
                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'class' => "layui-input"]) ?>
                <!--                <input type="text" name="userName" lay-verify="title" autocomplete="off" placeholder="用户名" required="true" class="layui-input">-->
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码框</label>
            <div class="layui-input-block">
                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'class' => "layui-input"]) ?>
            </div>
        </div>
<!--        <div class="layui-form-item">-->
<!--            <label class="layui-form-label">记住密码</label>-->
<!--            <div class="layui-input-block">-->
<!--                --><?php //echo  $form->field($model, 'rememberMe', ['template' => "<div class='layui-input-block'>{label}{input}{error}</div>"])->checkbox() ?>
<!--            </div>-->
<!--        </div>-->
        <div class="layui-form-item">
            <div class="layui-input-block">
                <?= Html::submitButton('立即提交', ['class' => 'layui-btn', 'name' => 'login-button']) ?>
                <!--                <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>-->
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </form>


</div>
<!-- /.login-box-body -->
</div><!-- /.login-box -->
