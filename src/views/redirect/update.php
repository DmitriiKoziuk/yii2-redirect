<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Redirect\entities\RedirectEntity */

$this->title = Yii::t('app', 'Update Redirect Entity: {name}', [
    'name' => $model->from_url_hash,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirect Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->from_url_hash, 'url' => ['view', 'id' => $model->from_url_hash]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="redirect-entity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
