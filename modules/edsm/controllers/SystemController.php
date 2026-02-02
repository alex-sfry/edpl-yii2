<?php

namespace app\modules\edsm\controllers;

use app\components\YiiHttpClient;
use app\edsm\models\SystemSave;
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

            if ((new SystemSave())->loadAndSave($data)) {
                \Yii::$app->session->addFlash('success', "Successfully created `{$data['name']}` system.");
                return $this->redirect(['/system/index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}
