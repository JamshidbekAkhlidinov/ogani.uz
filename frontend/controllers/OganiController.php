<?php

namespace frontend\controllers;

use common\models\Shop;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class OganiController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionShopGrid()
    {
        $model = Shop::find()->where('price!=price_new')->andWhere('status=1')->orderBy('created_at DESC')->all();
        $model2 = Shop::find()->where('price=price_new')->andWhere('status=1')->orderBy('created_at DESC')->all();
        
        return $this->render('shop-grid',['models'=>$model,'model2'=>$model2]);
    }

    public function actionShopDetails($id)
    {
        $model = Shop::findOne($id);
        return $this->render('shop-details',['model'=>$model]);
    }

    public function actionShopingCart()
    {
        return $this->render('shoping-cart');
    }

    public function actionCheckout()
    {
        return $this->render('checkout');
    }

    
    public function actionContact()
    {
        return $this->render('contact');
    }

}
