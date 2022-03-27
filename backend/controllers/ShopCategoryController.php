<?php

namespace backend\controllers;

use common\models\ShopCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ShopCategoryController implements the CRUD actions for ShopCategory model.
 */
class ShopCategoryController extends DefaultController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ShopCategory::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopCategory model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShopCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ShopCategory();

        $model->scenario = ShopCategory::CEREATED;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm = UploadedFile::getInstance($model,'img');
                if($rasm){
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm->extension;
                    $rasm->saveAs('imgs/shopcategory/'.$name);
                    $model->img = $name;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ShopCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $name = $model->img;
        $model->scenario = ShopCategory::UPDATED;

        if ($this->request->isPost && $model->load($this->request->post())) {
                $rasm = UploadedFile::getInstance($model,'img');
                if($rasm){
                    if($name and file_exists('imgs/shopcategory/'.$name)){
                        unlink('imgs/shopcategory/'.$name);
                    }
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm->extension;
                    $rasm->saveAs('imgs/shopcategory/'.$name);
                }
                $model->img = $name;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShopCategory model.
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
     * Finds the ShopCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ShopCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopCategory::find()->multilingual()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
