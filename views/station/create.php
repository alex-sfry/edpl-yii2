<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Station $model */

$this->title = 'Create Station';
$this->params['breadcrumbs'][] = ['label' => 'Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'systems' => $systems]) ?>

</div>
