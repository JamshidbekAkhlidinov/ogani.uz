<?php

namespace backend\modules\telegrambot\models;

class BotApi{

    private $token;

    public function __construct($token = []){
        $this->token = $token;
    }

    
    public function setWebhook($url){
        return $this->request('setWebhook',[
            'url'=>$url,
        ]);
    }

    public function sendMessage($chat_id,$text,$options=[]){
        return $this->request('sendMessage',
            array_merge(
                [
                    'chat_id'=>$chat_id,
                    'text'=>$text,
                    'parse_mode'=>'html',
                ],
                $options,
            )
        );
    }

    public function sendPhoto($chat_id,$photo,$options=[]){
        return $this->request('sendPhoto',
            array_merge(
                [
                    'chat_id'=>$chat_id,
                    'photo'=>$photo,
                    'parse_mode'=>'html',
                ],
                $options,
            )
        );
    }


    public function sendVideo($chat_id,$video,$options=[]){
        return $this->request('sendVideo',
            array_merge(
                [
                    'chat_id'=>$chat_id,
                    'video'=>$video,
                    'parse_mode'=>'html',
                ],
                $options,
            )
        );
    }

    public function sendDocument($chat_id,$document,$options=[]){
        return $this->request('sendDocument',
            array_merge(
                [
                    'chat_id'=>$chat_id,
                    'document'=>$document,
                    'parse_mode'=>'html',
                ],
                $options,
            )
        );
    }

    public  function deleteMessage($chat_id,$message_id){
        return $this->request('deleteMessage',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
        ]);
    }

    public function getFile($file_id){
        return $this->request('getFile',[
            'file_id'=>$file_id,
        ]);
    }

    
    public function getChat($chat_id){
        $required_fields = [
            'chat_id' => $chat_id,
        ];
        return $this->request('getChat',$required_fields);
    }

    public function exportChatInviteLink($chat_id){
        return $this->request('exportChatInviteLink',[
            'chat_id' => $chat_id,
        ]);
    }

    public function editMessageText($chat_id,$message_id,$text,$options = []) {
        $required_fields = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => $text,
        ];
        $params = array_merge($required_fields,$options);
        return $this->request('editMessageText',$params);
    }

    public function editMessageReplyMarkup($chat_id,$message_id,$reply_markup,$options = []) {
        $required_fields = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'reply_markup' => $reply_markup,
        ];
        $params = array_merge($required_fields,$options);
        return $this->request('editMessageReplyMarkup',$params);
    }

    public function answerCallback($callback_request_id,$text,$show_alert = true,$options = []) {
        $required_fields = [
            'callback_request_id' => $callback_request_id,
            'text' => $text,
            'show_alert' => $show_alert
        ];
        $params = array_merge($required_fields,$options);
        return $this->request('answerCallbackrequest',$params);
    }



    public function sendMediaGroup($chat_id,$media,$optional_fields = []) {
        $required_fields = [
            'chat_id' => $chat_id,
            'media' => $media,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('sendMediaGroup',$params);
    }

    public function sendChatAction($chat_id,$action) {
        $required_fields = [
            'chat_id' => $chat_id,
            'action' => $action,
        ];

        $params = array_merge($required_fields);
        return $this->request('sendChatAction',$params);
    }

    public function sendSticker($chat_id,$sticker,$optional_fields = []) {
        $required_fields = [
            'chat_id' => $chat_id,
            'sticker' => $sticker,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('sendSticker',$params);
    }

    public function forwardMessage($chat_id,$from_chat_id,$message_id,$optional_fields = []){
        $required_fields = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('forwardMessage',$params);
    }

    public function sendVoice($chat_id,$voice,$optional_fields = []){
        $required_fields = [
            'chat_id' => $chat_id,
            'voice' => $voice,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('sendVoice',$params);
    }

    public function sendContact($chat_id,$phone_number,$first_name,$optional_fields = null){
        $required_fields = [
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('sendContact',$params);
    }


    public function answerInlinerequest($inline_request_id,$results,$optional_fields = null){
        $required_fields = [
            'inline_request_id' => $inline_request_id,
            'results' => $results,
        ];
        $params = array_merge($required_fields,$optional_fields);
        return $this->request('answerInlinerequest',$params);
    }

    public function sendLocation($chat_id,$latitude,$longitude,$optional_fields = null){
        $required_fields = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        $params = array_merge($required_fields,$optional_fields);
        return $this->request('sendLocation', $params);
    }

    public function getMe(){
        $params = [];
        return $this->request('getMe',$params);
    }

    public function getUpdates($options = []){
        return $this->request('getUpdates',$options);
    }


    public function Updates(){
        $update = json_decode(file_get_contents("php://input"));
        return $update;
    }

   public function request($method, $data){
    $ch = curl_init();
    $url = "https://api.telegram.org/bot".$this->token."/".$method;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
   }


}

?>