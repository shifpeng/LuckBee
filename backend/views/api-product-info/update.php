<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmfApiProductInfoContact */

$this->title = 'Update T Lmf Api Product Info Contact: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lmf Api Product Info Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tlmf-api-product-info-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
