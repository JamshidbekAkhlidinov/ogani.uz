<?php

namespace backend\models;

use yii\base\Model;

class PaswordForm extends Model{
    
    public $parol0;
    public $parol1;
    public $parol2;

    public function rules()
    {
        return[
            [['parol0','parol1','parol2'],'required'],

        ];

    }

    public function attributeLabels()
    {
        return [
            'parol0'=>"Eski parol",
            'parol1'=>"Yangi parol",
            'parol2'=>"Yangi parol (qayta)",
        ];
    }

}

?>