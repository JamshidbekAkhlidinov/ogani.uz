<?php
namespace restapi\controllers;

use common\models\User;
use restapi\models\Users;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController{

    public $modelClass = 'restapi\models\Users';

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
            'query'=>Users::find(),
            'pagination'=>[
                'defaultPageSize'=>20,
            ]
        ]);
        return $dataProvider;
    }


    public function actionCreate()
    {
        $form = new User();

        if ($form->load(\Yii::$app->request->post()) && $form->save()) {
            return ['auth_key' => $form->auth_key];
        }

        $this->response->statusCode = 422;
        return $form->getErrors();
    }
}