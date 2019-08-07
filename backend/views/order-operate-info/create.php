<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderOperateConfigInfo */

$this->title = 'Create T Lm Api Order Operate Config Info';
$this->params['breadcrumbs'][] = ['label' => 'T Lm Api Order Operate Config Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlm-api-order-operate-config-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
