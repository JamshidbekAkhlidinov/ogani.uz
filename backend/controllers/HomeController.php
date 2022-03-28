<?php

namespace backend\controllers;

use common\models\Home;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HomeController implements the CRUD actions for Home model.
 */
class HomeController extends DefaultController
{
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Home::find(),
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
     * Displays a single Home model.
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
     * Creates a new Home model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Home();
        $model->scenario = Home::CREATED;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm1 = UploadedFile::getInstance($model,'img');
                $rasm2 = UploadedFile::getInstance($model,'imgrek1');
                $rasm3 = UploadedFile::getInstance($model,'imgrek2');
                if($rasm1){
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm1->extension;
                    $rasm1->saveAs('imgs/home/'.$name);
                    $model->img = $name;
                }
                if($rasm2){
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm2->extension;
                    $rasm2->saveAs('imgs/home/'.$name);
                    $model->imgrek1 = $name;
                }
                if($rasm3){
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm3->extension;
                    $rasm3->saveAs('imgs/home/'.$name);
                    $model->imgrek2 = $name;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Home model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $name1 =  $model->img ;
        $name2 =  $model->imgrek1 ;
        $name3 =  $model->imgrek2 ;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $rasm1 = UploadedFile::getInstance($model,'img');
            $rasm2 = UploadedFile::getInstance($model,'imgrek1');
            $rasm3 = UploadedFile::getInstance($model,'imgrek2');
            if($rasm1){
                if($name1 and file_exists('img/home/'.$name1)){
                    unlink('img/home/'.$name1);
                }
                $name1 = Yii::$app->getSecurity()->generateRandomString().".".$rasm1->extension;
                $rasm1->saveAs('imgs/home/'.$name1);
                $model->img = $name1;
            }else{
                $model->img = $name1;
            }
            if($rasm2){
                if($name2 and file_exists('img/home/'.$name2)){
                    unlink('img/home/'.$name2);
                }
                $name2 = Yii::$app->getSecurity()->generateRandomString().".".$rasm2->extension;
                $rasm2->saveAs('imgs/home/'.$name2);
                $model->imgrek1 = $name2;
            }else{
                $model->imgrek1 = $name2;
            }
            if($rasm3){
                if($name3 and file_exists('img/home/'.$name3)){
                    unlink('img/home/'.$name3);
                }
                $name3 = Yii::$app->getSecurity()->generateRandomString().".".$rasm3->extension;
                $rasm3->saveAs('imgs/home/'.$name3);
                $model->imgrek2 = $name3;
            }else{
                $model->imgrek2 = $name3;
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Home model.
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
     * Finds the Home model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Home the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Home::find()->multilingual()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
