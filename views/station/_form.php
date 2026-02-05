<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Station $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $system_name */
?>

<div class="station-form">
    <div class="col-md-10 col-lg-8 col-xl-6">
        <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'enableClientScript' => false]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->beginField($model, 'system_id') ?>
                <div class="d-flex justify-content-between">
                    <?= Html::activeLabel($model, 'system_id', ['class' => 'form-label me-2']) ?>
                    <output><em>Selected: <strong><?= $system_name ?></strong></em></output>
                </div>
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1 me-1">
                        <?= Html::activeInput('number', $model, 'system_id', ['class' => 'form-control']) ?>
                        <div class="invalid-feedback"></div>
                    </div>
                    <?= Html::a(
                        'select system',
                        ['/systems/select', 'return' => Url::to(['stations/create'])],
                        ['class' => 'btn btn-secondary text-nowrap']
                    ) ?>
                </div>

                <?= $form->endField() ?>

                <?= $form->field($model, 'name')->label('Station Name')->textInput([
                    // 'required' => true,
                    // 'minLength' => 3
                ]) ?>

                <?= $form->field($model, 'type')->dropDownList(stationTypes(), ['prompt' => 'select type']) ?>

                <?= $form->field($model, 'dta')->input('number') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

                <?= $form->field($model, 'government')->dropDownList(governments(), [
                    'prompt' => 'select government'
                ]) ?>

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