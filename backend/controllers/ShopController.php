<?php

namespace backend\controllers;

use common\models\ProductsImgs;
use common\models\Shop;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends DefaultController
{
    

    /**
     * Lists all Shop models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Shop::find(),
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
     * Displays a single Shop model.
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
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Shop();
        $model->scenario = Shop::CREATE;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imgs = UploadedFile::getInstances($model,'img');
                $model->img = "photo";
                $model->save();
                if($imgs){
                    foreach($imgs as $img){
                        $photo = new ProductsImgs();
                        $name  = Yii::$app->getSecurity()->generateRandomString(10).".".$img->extension;
                        $img->saveAs("imgs/products/".$name);
                        $photo->name = $name;
                        $photo->products_id = $model->id;
                        $photo->save();
                    }
                }                
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
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Shop::UPDATE;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $imgs = UploadedFile::getInstances($model,'img');
            $model->img = 'photo';
            $model->save();
            if($imgs){
                foreach($imgs as $img){
                    $photo = new ProductsImgs();
                    $name  = Yii::$app->getSecurity()->generateRandomString(10).".".$img->extension;
                    $img->saveAs("imgs/products/".$name);
                    $photo->name = $name;
                    $photo->products_id = $model->id;
                    $photo->save();
                }
            }   
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model =  Shop::findOne($id);
        foreach($model->imgs as $img){
            if(file_exists('imgs/products/'.$img->name)){
                unlink('imgs/products/'.$img->name);
            }
        }
        $model->delete();
        return $this->redirect(['index']);
    }


    public function actionDelimg($id){
        $model = ProductsImgs::findOne($id);
        if(file_exists('imgs/products/'.$model->name)){
           unlink('imgs/products/'.$model->name);
        }
        $model->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shop::find()->multilingual()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
