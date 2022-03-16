<?php

namespace frontend\controllers;

use common\models\Orders;
use common\models\People;
use common\models\Shop;
use common\models\ShopCategory;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
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
        $model2 = Shop::find()->where('price=price_new')->andWhere('status=1')->orderBy('created_at DESC');
        
        $page = new Pagination([
            'defaultPageSize'=>12,
            'totalCount'=>$model2->count(),
        ]);
        $products = $model2->offset($page->offset)->limit($page->limit)->all();
        
        return $this->render('shop-grid',['models'=>$model,'model2'=>$products,'page'=>$page]);
    }

    public function actionShopDetails($id)
    {
        $model = Shop::findOne($id);
        if($model!==null){
            return $this->render('shop-details',['model'=>$model]);
        }else{
            throw new \yii\web\HttpException(404, 'Bunday maxsulot yo`q.');
       }
}


    public function actionCategory($id=0,$min = 1,$max=1000000){
        $min = str_replace(["%24",'$'],['',''],$min);
        $max = str_replace(["%24",'$'],['',''],$max);
        if($id==0){
        $category = Shop::find()->Where("price_new>=$min")->andWhere("price_new<=$max");
        }else{
        $category = Shop::find()->where('category_id='.$id)->andWhere("price_new>=$min")->andWhere("price_new<=$max");
        }
        
        $page = new Pagination([
            'defaultPageSize'=>12,
            'totalCount'=>$category->count(),
        ]);
        $products = $category->offset($page->offset)->limit($page->limit)->all();

        return $this->render('category',['models'=>$products,'page'=>$page]);
    }

    public function actionShopingCart()
    {
        if(isset($_SESSION['card'])){
            return $this->render('shoping-cart');
        }else{
            Yii::$app->session->setFlash('warning',"Siz hali hech nima tanlamadingiz");
            return $this->redirect(['ogani/shop-grid']);
        }
    }

    public function actionCheckout()
    {
        $session = Yii::$app->session;
        $session->open();

        $model = new People();
        if($model->load(Yii::$app->request->post())){
            $model->save();
            foreach ($_SESSION['card'] as $id => $value) {
                $orders = new Orders();
                $orders->order_id = $model->id;
                $orders->product_id = $id;
                $orders->product_count = $value['soni'];
                $orders->product_name = $value['name'];
                $orders->product_price = $value['price_new'];
                $orders->product_sum = $value['price_new']*$value['soni'];
                $orders->save();
            }
            Yii::$app->session->setFlash('success','Buyurtmanigiz qabul qilindi. Tez orada siz bilan bog`;anamiz');
            $session->remove('card');
            $session->remove('card.soni');
            $session->remove('card.sum');

            return $this->redirect(['ogani/index']);
        }
        if(isset($session['card'])){
            return $this->render('checkout',['model'=>$model]);
        }else{
            Yii::$app->session->setFlash('warning',"Siz hali hech nima tanlamadingiz");
            return $this->redirect(['ogani/shop-grid']);
        }
    }

    
    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionComent()
    {
        return $this->renderAjax('coment');
    }
}
