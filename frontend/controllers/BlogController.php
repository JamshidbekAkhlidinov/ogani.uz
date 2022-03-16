<?php

namespace frontend\controllers;

use common\models\Blog;
use common\models\Coments;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\HttpException;

class BlogController extends Controller
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

    const SHOP = 1;
    const BLOG  = 2;
    public function actionIndex()
    {
        $blogs = Blog::find()->orderBy('created_at DESC');
        $page = new Pagination([
            'totalCount'=>$blogs->count(),
            'defaultPageSize'=>6,
        ]);
        $model = $blogs->limit($page->limit)->offset($page->offset)->all();

        return $this->render('index',['model'=>$model,'page'=>$page]);
    }

    public function actionBlogDetails($id)
    {
        $model = Blog::findOne($id);
        if($model!==null){
            return $this->render('blog-details',['model'=>$model]);
        }else{
            throw new HttpException(404,'Malumotlar topilmadi');
        }
    }

    public function actionComents($id){
        $model = new Coments();
        if($model->load(Yii::$app->request->post())){
            $model->category_id = self::BLOG;
            $model->owner_id = $id;
            if($model->save()){
                Yii::$app->session->setFlash('success',"Comentariyangiz qabul qilindi. Tez orada ko`rinadi");
            }else{
                Yii::$app->session->setFlash('error',"Nimadur xato");
            }
            return $this->redirect(['blog/blog-details','id'=>$id]);
        }
        return $this->renderAjax('coments',['model'=>$model]);
    }

}
