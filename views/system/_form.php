<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\System $model */
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

    <?= $form->field($model, 'name')->textInput(/* ['required' => true, 'minLength' => 3] */) ?>

    <?= $form->field($model, 'primary_economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

    <?= $form->field($model, 'secondary_economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

    <?= $form->field($model, 'allegiance')->dropDownList(allegiances(), ['prompt' => 'select allegiance']) ?>

    <?= $form->field($model, 'security')->dropDownList(sec_levels(), ['prompt' => 'select security']) ?>

    <?= $form->field($model, 'population')->input('number') ?>

    <div class="mb-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>