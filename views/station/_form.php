<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\assets\TomSelectAsset;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Station $model */
/** @var yii\bootstrap5\ActiveForm $form */

// TomSelectAsset::register($this);
// $this->registerCss('
//     .icon{
//         width: 3rem;
//     }
//     .item{
//         width: 100%;
//     }
// ');
?>

<div class="station-form d-inline-block">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableClientScript' => false,
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-form-label text-nowrap me-2'],
            'options' => ['class' => 'mb-3 d-flex']
        ]
    ]); ?>

    <?php /* $options = isset($model->system) ? [$model->system_id => $model->system->name] : [] */ ?>
    <?php /* echo $form->field($model, 'system_id')->label('System')->dropDownList($options, [
        'placeholder' => 'partial system name',
        'required' => true,
    ]) */ ?>

    <?= $form->beginField($model, 'system_id', ['options' => ['class' => 'mb-3']]) ?>
    <div class="d-flex">
        <?= Html::activeLabel($model, 'system_id', ['class' => 'col-form-label text-nowrap me-2']) ?>
        <?= Html::activeInput('number', $model, 'system_id', ['class' => 'form-control', 'readonly' => true]) ?>
        <a class="btn btn-secondary ms-1 text-nowrap"
           href="<?= Url::to(['/system/select', 'return' => Url::to(['/station/create'])]) ?>">
            select system
        </a>
    </div>
    <?php if ($model->hasErrors('system_id')) : ?>
        <div class="mt-1 text-danger">
            <small><?= e($model->getFirstError('system_id')) ?></small>
        </div>
    <?php endif; ?>
    <?= $form->endField() ?>

    <?= $form->field($model, 'name')->label('Station Name') ?>

    <?= $form->field($model, 'dta')->input('number') ?>

    <?= $form->field($model, 'type')->dropDownList(stationTypes(), ['prompt' => 'select type']) ?>

    <?= $form->field($model, 'economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

    <?= $form->field($model, 'allegiance')->dropDownList(allegiances(), ['prompt' => 'select allegiance']) ?>

    <div class="mb-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
