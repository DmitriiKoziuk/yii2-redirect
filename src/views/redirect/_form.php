<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Redirect\entities\RedirectEntity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redirect-entity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_url_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'to_url')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
