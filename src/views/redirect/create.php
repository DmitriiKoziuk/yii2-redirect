<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Redirect\entities\RedirectEntity */

$this->title = Yii::t('app', 'Create Redirect Entity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirect Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redirect-entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
