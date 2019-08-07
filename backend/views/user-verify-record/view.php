<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserVerifyRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm User Verify Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tlm-user-verify-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'lm_member_id' => $model->lm_member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'lm_member_id' => $model->lm_member_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lm_member_id',
            'product_id',
            'operate_time',
            'status',
            'status_type',
            'reason',
            'del_flag',
            'add_time',
            'update_time',
        ],
    ]) ?>

</div>
