<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SystemSearch $searchModel */
/** @var yii\data\Pagination $pagination */
/** @var app\models\System[] $data */

$f = \Yii::$app->formatter;
$this->title = 'Systems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <div>
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">pr. eco</th>
                    <th scope="col">sec. eco</th>
                    <th scope="col">gov</th>
                    <th scope="col">allegiance</th>
                    <th scope="col">security</th>
                    <th scope="col">population</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->name ?></td>
                        <td><?= $item->primary_economy ?></td>
                        <td><?= $item->secondary_economy ?></td>
                        <td><?= $item->government ?></td>
                        <td><?= $item->allegiance ?></td>
                        <td><?= $item->security ?></td>
                        <td><?= $f->asInteger($item->population) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <?= LinkPager::widget([
        'pagination' => $pagination
    ]) ?>
</div>