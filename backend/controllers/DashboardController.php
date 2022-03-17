<?php

namespace backend\controllers;

use backend\models\User;
use Yii;

class DashboardController extends DefaultController
{
 
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfil()
    {
        $model = User::findOne(Yii::$app->user->identity->id);
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['dashboard/profil']);
        }
        return $this->render('profil',['model'=>$model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
   
}
