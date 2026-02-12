<?php

namespace app\controllers;

use app\models\Station;
use app\models\StationSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;
use yii\web\Response;

/**
 * StationController implements the CRUD actions for Station model.
 */
class StationController extends Controller
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
                    'only' => ['create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ]
            ],
        );
    }

    /**
     * Lists all Station models.
     * @param Request $request
     * @return string
     */
    public function actionIndex(Request $request)
    {
        $searchModel = new StationSearch();
        $dataProvider = $searchModel->search($request->queryParams);
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays a single Station model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new Station model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @param Request $request
     * @return string|\yii\web\Response
     */
    public function actionCreate(Request $request)
    {
        $model = new Station();

        if ($systemId = $request->get('systemId')) {
            $model->system_id = $systemId;
        }

        if ($request->isPost) {
            if ($model->load($request->post()) && $model->save()) {
                \Yii::$app->session->addFlash('success', "Successfully created '$model->name' station.");
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Station model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param Request $request
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(Request $request, $id)
    {
        $model = $this->findModel($id);
        $system_name = $model->system->name;

        if ($request->get('systemId') && $request->get('systemName')) {
            $model->system_id = $request->get('systemId');
            $system_name = $request->get('systemName');
        }

        if ($request->isPost && $model->load($request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model, 'system_name' => $system_name]);
    }

    /**
     * Deletes an existing Station model.
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
     * Action to select a system for forms that need a system_id parameter
     * @param Request $request
     * @return string
     */
    public function actionSelect(Request $request)
    {
        $searchModel = new StationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $return_url = $request->get('return');

        return $this->render('select', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'return_url' => $return_url,
        ]);
    }

    /**
     * Finds the Station model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Station the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Station::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
