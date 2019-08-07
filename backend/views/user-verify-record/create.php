<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserVerifyRecord */

$this->title = 'Create T Lm User Verify Record';
$this->params['breadcrumbs'][] = ['label' => 'T Lm User Verify Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlm-user-verify-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
