<?php

namespace app\modules\noar\controllers;

use app\modules\noar\models\SystemForm;

class SystemsController extends \yii\web\Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionCreate(): string
    {
        $model = new SystemForm();

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate(int $id): string
    {
        return $this->render('update');
    }

    public function actionDelete(int $id): string
    {
        return $this->render('delete');
    }
}
