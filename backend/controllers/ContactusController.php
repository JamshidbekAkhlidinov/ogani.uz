<?php

namespace backend\controllers;

use common\models\Contactus;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ContactusController implements the CRUD actions for Contactus model.
 */
class ContactusController extends DefaultController
{
   
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contactus::find(),
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
     * Displays a single Contactus model.
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
     * Creates a new Contactus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Contactus();
        $model->scenario = Contactus::CREATED;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $rasm1 = UploadedFile::getInstance($model,'logo');
                if($rasm1){
                    $name = Yii::$app->getSecurity()->generateRandomString().".".$rasm1->extension;
                    $rasm1->saveAs('imgs/home/'.$name);
                    $model->logo = $name;
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
     * Updates an existing Contactus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Contactus::UPDATED;
        $name1 =  $model->logo ;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $rasm1 = UploadedFile::getInstance($model,'logo');
            if($rasm1){
                if($name1 and file_exists('img/home/'.$name1)){
                    unlink('img/home/'.$name1);
                }
                $name1 = Yii::$app->getSecurity()->generateRandomString().".".$rasm1->extension;
                $rasm1->saveAs('imgs/home/'.$name1);
                $model->logo = $name1;
            }else{
                $model->logo = $name1;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contactus model.
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
     * Finds the Contactus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Contactus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contactus::find()->multilingual()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
