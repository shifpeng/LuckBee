<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IwuCertTask */

$this->title = Yii::t('app', 'Create Iwu Cert Task');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Iwu Cert Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iwu-cert-task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
