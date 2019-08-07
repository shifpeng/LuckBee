<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmApiLog */

$this->title = 'Create T Lm Api Log';
$this->params['breadcrumbs'][] = ['label' => 'T Lm Api Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlm-api-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
