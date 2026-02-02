<?php

/** @var yii\web\View $this */
/** @var string[] $mat_names */
/** @var string $material */
/** @var app\models\Material[] $models */

$this->title = 'Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">
    <h1><?= e($this->title) ?></h1>

    <div class="d-inline-block">
        <form method="get" action="">
            <div class="d-flex">
                <label for="material" class="col-form-label me-2">Material</label>
                <select name="material" id="material" class="form-select me-1">
                    <?php foreach ($mat_names as $mat_name): ?>
                        <option value="<?= $mat_name ?>" <?= $material === $mat_name ? 'selected' : '' ?>>
                            <?= $mat_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-secondary">s</button>
            </div>
        </form>
    </div>

    <?php if ($material) : ?>
        <div>
            <h2><?= e($material) ?></h2>
            <ul>
                <?php foreach ($models as $model): ?>
                    <li><?= e($model->location) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

</div>

</div>