<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserVerifyRecord */

$this->title = 'Update T Lm User Verify Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm User Verify Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'lm_member_id' => $model->lm_member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tlm-user-verify-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
