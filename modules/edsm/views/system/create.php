<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\edsm\models\SystemSave $system_save */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Create System from EDSM';
$this->params['breadcrumbs'][] = ['label' => 'Systems', 'url' => ['/system/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edsm-system-create">
    <h1><?= e($this->title) ?></h1>

    <?php if (isset($system_save) && $system_save->hasErrors()): ?>
        <?php foreach ($system_save->errors as $error): ?>
            <div class="alert alert-danger"><?= implode(', ', $error) ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="d-inline-block">
        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'enableClientScript' => false,
            'fieldConfig' => [
                'labelOptions' => ['class' => 'col-form-label text-nowrap me-2'],
                'options' => ['class' => 'mb-3 d-flex']
            ]
        ]); ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <div class="mb-3">
            <?= Html::submitButton('Fetch & Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>