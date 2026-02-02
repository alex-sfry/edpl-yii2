<?php

use app\models\Material;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Material $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="system-form d-inline-block">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableClientScript' => false,
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-form-label text-nowrap me-2'],
            'options' => ['class' => 'mb-3 d-flex']
        ]
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type')->dropDownList(
        ['raw' => 'Raw', 'encoded' => 'Encoded', 'manufactured' => 'Manufactured',],
        ['prompt' => 'Select type']
    ) ?>

    <?= $form->field($model, 'location') ?>

    <div class="mb-3">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>