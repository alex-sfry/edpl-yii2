<?php

use app\widgets\alext\SelectRelated;
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

    <?= SelectRelated::widget([
        'form' => $form,
        'model' => $model,
        'attribute' => 'system_id',
        'select' => 'system/select',
        'return' => 'station/create',
    ]) ?>

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