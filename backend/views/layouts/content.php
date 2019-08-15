<?php

use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\Breadcrumbs;

use backend\assets\LayUIAsset;

LayUIAsset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <?php $this->beginBody() ?>

    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>