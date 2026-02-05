<?php

use app\models\System;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SystemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Systems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!\Yii::$app->user->isGuest) : ?>
        <div class="d-flex mb-3">
            <?= Html::a('Create System', ['create'], ['class' => 'btn btn-success me-2']) ?>
            <?= Html::a('Create System from EDSM', ['edsm/system/create'], ['class' => 'btn btn-secondary']) ?>
        </div>
    <?php endif; ?>


    <?php /* echo $this->render('_search', ['model' => $searchModel]); */ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions' => ['class' => 'text-nowrap'],
        'rowOptions' => ['class' => 'text-nowrap'],
        'options' => ['class' => 'table-responsive'],
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class,
        ],
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'primary_economy',
                'filter' => economies(),
                'filterInputOptions' => ['class' => 'form-select']
            ],
            [
                'attribute' => 'secondary_economy',
                'filter' => economies(),
                'filterInputOptions' => ['class' => 'form-select']
            ],
            [
                'attribute' => 'government',
                'filter' => governments(),
                'filterInputOptions' => ['class' => 'form-select', 'style' => 'width: max-content;']
            ],
            [
                'attribute' => 'allegiance',
                'filter' => allegiances(),
                'filterInputOptions' => ['class' => 'form-select', 'style' => 'width: max-content;']
            ],
            [
                'attribute' => 'security',
                'filter' => sec_levels(),
                'filterInputOptions' => ['class' => 'form-select', 'style' => 'width: max-content;']
            ],
            'population:integer',
            [
                'class' => ActionColumn::class,
                'contentOptions' => ['class' => 'text-nowrap'],
                'urlCreator' => function ($action, System $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>