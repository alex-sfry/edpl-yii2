<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\assets\TomSelectAsset;

/** @var yii\web\View $this */
/** @var app\models\Station $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $system_name */
TomSelectAsset::register($this);
$this->registerCss('
    .icon{
        width: 3rem;
    }
    .item{
        width: 100%;
    }
');
?>

<div class="station-form">
    <div class="col-md-10 col-lg-8 col-xl-6">
        <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'enableClientScript' => false]); ?>
        <div class="row">
            <div class="col-md-6">
                <?php $options = isset($model->system) ? [$model->system_id => $model->system->name] : [] ?>
                <?= $form->field($model, 'system_id')->label('System')->dropDownList($options, [
                    'placeholder' => 'partial system name',
                    'required' => true,
                ]) ?>

                <?= $form->field($model, 'name')->label('Station Name')->textInput() ?>

                <?= $form->field($model, 'dta')->input('number') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'type')->dropDownList(stationTypes(), ['prompt' => 'select type']) ?>

                <?= $form->field($model, 'economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

                <?= $form->field($model, 'allegiance')->dropDownList(allegiances(), [
                    'prompt' => 'select allegiance'
                ]) ?>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>