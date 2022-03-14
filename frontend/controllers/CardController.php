<?php
namespace frontend\controllers;

use common\models\Shop;
use frontend\models\Card;
use Yii;
use yii\web\Controller;
use yii\web\Session;

class CardController extends Controller{

    public function actionAdd($id, $soni=1){
        $model = Shop::findOne($id);
        
        $session = Yii::$app->session;
        $session->open();

        $card = new Card();
        $card->AddToCard($model,$soni);       
        
        return $this->renderAjax('add');


    }

    public function actionShow(){
        return $this->renderAjax('add');
    }

    
    public function actionDelitem($id){

        $session = Yii::$app->session;
        $session->open();

        $card = new Card();
        $card->DelItem($id);   
        
        return $this->renderAjax('add');
    }

    public function actionClear(){

        $session = Yii::$app->session;
        $session->open();
        $session->remove('card');
        $session->remove('card.soni');
        $session->remove('card.sum');

        return $this->renderAjax('add');
    }


}



?>