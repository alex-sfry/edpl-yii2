<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SystemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="system-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'enableClientValidation' => false,
        'enableClientScript' => false
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'primary_economy')->dropDownList(economies(), ['prompt' => 'Any']) ?>

    <?= $form->field($model, 'secondary_economy')->dropDownList(economies(), ['prompt' => 'Any']) ?>

    <?= $form->field($model, 'government')->dropDownList(governments(), ['prompt' => 'Any']) ?>

    <?= $form->field($model, 'allegiance')->dropDownList(allegiances(), ['prompt' => 'Any']) ?>

    <?= $form->field($model, 'security')->dropDownList(
        [
            'High' => 'High',
            'Medium' => 'Medium',
            'Low' => 'Low',
            'Anarchy' => 'Anarchy'
        ],
        ['prompt' => 'Any']
    ) ?>

    <?= $form->field($model, 'population')->input('number') ?>

    <div class="mb-3">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>