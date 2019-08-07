<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmfApiProductInfoContact */

$this->title = 'Create T Lmf Api Product Info Contact';
$this->params['breadcrumbs'][] = ['label' => 'T Lmf Api Product Info Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tlmf-api-product-info-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
