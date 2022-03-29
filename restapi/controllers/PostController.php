<?php
namespace restapi\controllers;

use restapi\models\Xabarlar;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Response;

class PostController extends ActiveController{

    public $modelClass = 'restapi\models\Xabarlar';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
    }


    public function behaviors()
    {
        $behaviors  = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['POST', 'PUT','GET'],
            ],
        ];  
        $behaviors['formats'] = [
            'class' => 'yii\filters\ContentNegotiator',            
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
           
        ];

        return $behaviors;
    }

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query'=>Xabarlar::find(),
            'pagination'=>[
                'defaultPageSize'=>20,
            ]
        ]);
        return $dataProvider;
    }


}

?>