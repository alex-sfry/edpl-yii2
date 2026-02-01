<?php

namespace app\controllers;

use app\models\Station;
use app\models\StationSearch;
use app\models\System;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;

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
            ]
        );
    }

    /**
     * Lists all Station models.
     */
    public function actionIndex(Request $request): string
    {
        $searchModel = new StationSearch();
        $dataProvider = $searchModel->search($request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Displays a single Station model.
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Station model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate(Request $request): string|\yii\web\Response
    {
        $model = new Station();

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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(Request $request, int $id): string|\yii\web\Response
    {
        $model = $this->findModel($id);

        if ($request->isPost && $model->load($request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Station model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Station model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Station
    {
        if (($model = Station::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
