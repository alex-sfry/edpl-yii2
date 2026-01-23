<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\System $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="system-form row">
    <div class="col-md-10 col-lg-8 col-xl-6">

        <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'enableClientScript' => false]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['required' => true, 'minLength' => 3]) ?>

                <?= $form
                    ->field($model, 'primary_economy')
                    ->dropDownList(economies(), ['prompt' => 'select economy']) ?>

                <?= $form
                    ->field($model, 'secondary_economy')
                    ->dropDownList(economies(), ['prompt' => 'select economy']) ?>

                <?= $form
                    ->field($model, 'government')
                    ->dropDownList(governments(), ['prompt' => 'select government']) ?>
            </div>

            <div class="col-md-6">
                <?= $form
                    ->field($model, 'allegiance')
                    ->dropDownList(allegiances(), ['prompt' => 'select allegiance']) ?>

                <?= $form->field($model, 'security')->dropDownList(sec_levels(), ['prompt' => 'select security']) ?>

                <?= $form->field($model, 'population')->input('number') ?>

                <?= $form->field($model, 'star_type')->textInput() ?>
            </div>
        </div>

        <div class="mb-3">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>