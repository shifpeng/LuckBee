<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserBaseInfo */

$this->title = 'Create T Lm User Base Info';
$this->params['breadcrumbs'][] = ['label' => 'T Lm User Base Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlm-user-base-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
