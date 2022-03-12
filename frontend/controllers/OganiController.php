<?php

namespace frontend\controllers;

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
        return $this->render('shop-grid');
    }

    public function actionShopDetails()
    {
        return $this->render('shop-details');
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
