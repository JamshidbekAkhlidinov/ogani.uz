<?php

namespace backend\modules\telegrambot\controllers;

use backend\modules\telegrambot\models\BotApi;
use yii\web\Controller;

class MurojatBotController extends Controller{

    public function actionIndex(){

        $token = '1636426001:AAEEcq8i3x3E_u9hhtNU4uCt_vgYkiS-9d0';

    $bot = new BotApi($token);
    $updates =  $bot->Updates();  

    // if(isset($updates->message)){
        // $message = $updates->message;
        // $text =  $message->text;
        // $user_id = $message->from->id;

        $bot->sendMessage('859654135','salom');


    // }


    }

}

?>