<?php

use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\System $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableClientScript' => false,
    'fieldConfig' => [
        'labelOptions' => ['class' => 'col-form-label text-nowrap me-2'],
        'options' => ['class' => 'mb-3 d-flex']
    ]
]); ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'primaryEconomy')->dropDownList(economies()) ?>

<?= $form->field($model, 'secondaryEconomy')->dropDownList(economies()) ?>

<?= $form->field($model, 'allegiance')->dropDownList(allegiances()) ?>

<?= $form->field($model, 'security')->dropDownList(sec_levels()) ?>

<?= $form->field($model, 'population', ['inputOptions' => ['type' => 'number']]) ?>

<div class="mb-3">
    <button type="submit" class="btn btn-success">Save</button>
</div>
<?php ActiveForm::end(); ?>