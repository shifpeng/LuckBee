<?php

namespace backend\controllers;

use Yii;
use backend\models\TLmUserVerifyRecord;
use backend\models\search\UserVerifyRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserVerifyRecordController implements the CRUD actions for TLmUserVerifyRecord model.
 */
class UserVerifyRecordController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TLmUserVerifyRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserVerifyRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSearch()
    {
        $searchModel = new UserVerifyRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'pro');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single TLmUserVerifyRecord model.
     * @param integer $id
     * @param string $lm_member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $lm_member_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $lm_member_id),
        ]);
    }

    /**
     * Creates a new TLmUserVerifyRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TLmUserVerifyRecord();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'lm_member_id' => $model->lm_member_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TLmUserVerifyRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $lm_member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $lm_member_id)
    {
        $model = $this->findModel($id, $lm_member_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'lm_member_id' => $model->lm_member_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TLmUserVerifyRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $lm_member_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $lm_member_id)
    {
        $this->findModel($id, $lm_member_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TLmUserVerifyRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $lm_member_id
     * @return TLmUserVerifyRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $lm_member_id)
    {
        if (($model = TLmUserVerifyRecord::findOne(['id' => $id, 'lm_member_id' => $lm_member_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
