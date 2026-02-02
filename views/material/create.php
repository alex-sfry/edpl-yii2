<?php

/** @var yii\web\View $this */
/** @var app\models\Material $model */

$this->title = 'Create Material';
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-create">

    <h1><?= e($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>