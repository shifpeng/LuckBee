<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiOrderOperateConfigInfo */

$this->title = 'Update T Lm Api Order Operate Config Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm Api Order Operate Config Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tlm-api-order-operate-config-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
