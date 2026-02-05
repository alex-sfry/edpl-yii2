<?php

use app\models\Station;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Station', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

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
            ['attribute' => 'type', 'filter' => stationTypes(), 'filterInputOptions' => ['class' => 'form-select']],
            'dta',
            ['attribute' => 'economy', 'filter' => economies(), 'filterInputOptions' => ['class' => 'form-select']],
            [
                'attribute' => 'government',
                'filter' => governments(),
                'filterInputOptions' => ['class' => 'form-select']
            ],
            [
                'attribute' => 'allegiance',
                'filter' => allegiances(),
                'filterInputOptions' => ['class' => 'form-select']
            ],
            ['attribute' => 'system.name', 'label' => 'System'],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Station $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>