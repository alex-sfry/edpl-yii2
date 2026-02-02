<?php

namespace app\controllers;

use app\models\Material;
use yii\data\ActiveDataProvider;
use yii\web\Request;

class MaterialController extends \yii\web\Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function actionIndex(Request $request)
    {
        $mat_names = Material::find()->distinct()->select('name')->orderBy('name')->column();

        $q = $request->get('q');

        if ($q) {
            $query = Material::find()->select('location')->where(['name' => $q]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        }

        return $this->render('index', [
            'mat_names' => $mat_names,
            'models' => isset($q) ? $dataProvider->getModels() : [],
            'material' => $q
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Material();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->addFlash(
                'success',
                "Successfully created  material '$model->name' at '$model->name' location."
            );
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }
}
