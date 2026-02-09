<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SystemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string $return_url */

$this->title = 'Select System';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-index">
    <h1><?= e($this->title) ?></h1>

    <div class="row">
        <div class="col-md-10 col-lg-7 col-xl-5">
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
                        'class' => ActionColumn::class,
                        'template' => '{select}',
                        'contentOptions' => ['class' => 'text-nowrap text-center'],
                        'buttons' => [
                            'select' => function ($url, \app\models\System $model) use ($return_url) {
                                return Html::a(
                                    'Select',
                                    Url::to([$return_url, 'systemId' => $model->id, 'systemName' => $model->name]),
                                    ['class' => 'btn btn-success']
                                );
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
