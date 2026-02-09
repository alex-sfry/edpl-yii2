<?php

namespace app\controllers;

use app\models\System;
use app\models\SystemSearch;
use InvalidArgumentException;
use yii\filters\AccessControl;
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
            ],
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['create', 'update', 'delete', 'search'],
                    'rules' => [
                        [
                            'actions' => ['create', 'update', 'delete', 'search'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ]
            ],
        );
    }

    /**
     * Lists all System models.
     */
    public function actionIndex(): string
    {
        $searchModel = new SystemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays a single System model.
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new System model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate(): string|Response
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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id): string|Response
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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Action for searching systems by partial name (for AutoComplete inputs like TomSelect)
     */
    public function actionSearch(Request $request, Response $response): array
    {
        $q = $request->get('q');

        if (!$q) {
            throw new InvalidArgumentException('Missing parameter - q');
        }

        $response->format = $response::FORMAT_JSON;
        return System::find()->select(['id', 'name'])->where(['like', 'name', $q . '%', false])->orderBy('name')->all();
    }

    /**
     * Action to select a system for forms that need a system_id parameter
     */
    public function actionSelect(Request $request): string
    {
        $searchModel = new SystemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $return_url = $request->get('return');

        return $this->render('select', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'return_url' => $return_url,
        ]);
    }

    /**
     * Finds the System model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): System
    {
        if (($model = System::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
