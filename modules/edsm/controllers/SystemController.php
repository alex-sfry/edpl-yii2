<?php

namespace app\modules\edsm\controllers;

use app\components\YiiHttpClient;
use app\modules\edsm\models\SystemSave;
use yii\base\DynamicModel;
use yii\web\Controller;

class SystemController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DynamicModel(['name']);
        $model->addRule('name', 'required')->addRule('name', 'string', ['max' => 255, 'min' => 3]);

        if ($model->load($this->request->post()) && $model->validate()) {
            $http = new YiiHttpClient();
            $data = $http->get('https://www.edsm.net/api-v1/system', [
                'systemName' => $model->name,
                'showInformation' => 1,
            ]);

            $system_save = new SystemSave();
            if ($system_save->loadAndSave($data)) {
                \Yii::$app->session->addFlash('success', "Successfully created `{$data['name']}` system.");
                return $this->redirect(['/system/index']);
            } else {
                return $this->render('create', ['model' => $model, 'system_save' => $system_save]);
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}
