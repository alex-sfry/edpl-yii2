<?php

namespace app\controllers;

use app\models\System;
use app\models\SystemSearch;
use InvalidArgumentException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;
use yii\web\Response;

/**
 * SystemController implements the CRUD actions for System model.
 */
class SystemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all System models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SystemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays a single System model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new System model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new System();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                \Yii::$app->session->addFlash('success', "Successfully created '$model->name' system.");
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing System model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing System model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return array
     */
    public function actionSearch(Request $request, Response $response)
    {
        $q = $request->get('q');

        if (!$q) {
            throw new InvalidArgumentException('Missing parameter - q');
        }

        $response->format = $response::FORMAT_JSON;
        return System::find()->select(['id', 'name'])->where(['like', 'name', $q . '%', false])->orderBy('name')->all();
    }

    /**
     * Finds the System model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return System the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = System::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
