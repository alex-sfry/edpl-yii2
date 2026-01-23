<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\System $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="system-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="white-space:nowrap">{label}</th><td style="width:100%">{value}</td></tr>',
                'attributes' => [
                    'id',
                    'name',
                    'primary_economy',
                    'secondary_economy',
                    'government',
                    'allegiance',
                    'security',
                    'population:integer',
                    'star_type',
                    'created_at',
                    'updated_at'
                ],
            ]) ?>
        </div>
    </div>

</div>