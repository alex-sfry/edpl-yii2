<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Station $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="station-form">
    <div class="col-md-10 col-lg-8 col-xl-6">

        <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'enableClientScript' => false]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'system_id')->begin() ?>
                <?= Html::activeLabel($model, 'system_id', ['class' => 'form-label']) ?>

                <?= Html::activeTextInput($model, 'system_id', ['label' => 'System Name', 'class' => 'form-control']) ?>

                <datalist class="ac-datalist"></datalist>

                <div class="invalid-feedback"></div>
                <?= $form->field($model, 'system_id')->end() ?>

                <?= $form
                    ->field($model, 'name')
                    ->label('Station Name')
                    ->textInput(['required' => true, 'minLength' => 3]) ?>

                <?= $form->field($model, 'type')->dropDownList(stationTypes(), ['prompt' => 'select type']) ?>

                <?= $form->field($model, 'dta')->input('number') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'economy')->dropDownList(economies(), ['prompt' => 'select economy']) ?>

                <?= $form
                    ->field($model, 'government')
                    ->dropDownList(governments(), ['prompt' => 'select government']) ?>

                <?= $form
                    ->field($model, 'allegiance')
                    ->dropDownList(allegiances(), ['prompt' => 'select allegiance']) ?>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>