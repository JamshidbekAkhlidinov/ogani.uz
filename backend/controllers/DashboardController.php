<?php

namespace backend\controllers;

use backend\models\PaswordForm;
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
            if($model->save()){
            Yii::$app->session->setFlash('success',"Siz istagandak bo'ldi");
            }else{
            Yii::$app->session->setFlash('warning',"Saqlashda xatolik");

            }
            return $this->redirect(['dashboard/profil']);
        }

        $parol = new PaswordForm();
        if($parol->load(Yii::$app->request->post())){
            if(yii::$app->getSecurity()->validatePassword($parol->parol0,$model->password_hash) and ($parol->parol1==$parol->parol2)){
                $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($parol->parol1);
                if($model->save()){
            Yii::$app->session->setFlash('success',"Siz istagandak bo'ldi. Parollar o`zgartirildi");
                return $this->redirect(['dashboard/profil']);
            }else{
                Yii::$app->session->setFlash('warning',"Saqlashda xatolik");
                return $this->redirect(['dashboard/profil']);
            }
        }else{
            Yii::$app->session->setFlash('error',"Parollar mos kelmadi");
            return $this->redirect(['dashboard/profil']);
        }
        }

        return $this->render('profil',['model'=>$model,'parol'=>$parol]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
   
}
