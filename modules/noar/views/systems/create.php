<?php

/** @var yii\web\View $this */
/** @var app\models\System $model */

$this->title = 'Create System';
?>
<div class="noar-create-system d-inline-block">

    <h1><?= e($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>