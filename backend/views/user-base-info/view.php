<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TLmUserBaseInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T Lm User Base Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tlm-user-base-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'user_name',
            'id_card_no',
            'max_monthly_repayment',
            'education_level',
            'social_security',
            'vehicle_ownership',
            'work_type',
            'operating_income',
            'operating_years',
            'monthly_income',
            'work_years',
            'ip',
            'location',
            'del_flag',
            'source',
            'status',
            'add_time',
            'update_time',
        ],
    ]) ?>

</div>
