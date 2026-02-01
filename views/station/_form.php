<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */
/** @var app\models\Station $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\System[]|array $systems */
JqueryAsset::register($this);
?>

<div class="station-form">
    <div class="col-md-10 col-lg-8 col-xl-6">

        <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'enableClientScript' => false]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'systemName')->begin() ?>

                <?= Html::activeLabel($model, 'systemName', ['label' => 'System Name', 'class' => 'form-label']) ?>
                <?= Html::activeTextInput($model, 'systemName', [
                    'class' => $model->getFirstError('systemName') ? 'form-control is-invalid' : 'form-control',
                    'list' => 'systemName'
                ]) ?>
                <div class="invalid-feedback"><?= $model->getFirstError('systemName') ?></div>

                <datalist id="systemName" class="ac-datalist">
                    <?php foreach ($systems as $item) : ?>
                        <option value="<?= $item ?>"></option>
                    <?php endforeach; ?>
                </datalist>

                <?php echo $form->field($model, 'systemName')->end() ?>

                <?= $form
                    ->field($model, 'name')
                    ->label('Station Name')
                    ->textInput() ?>

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