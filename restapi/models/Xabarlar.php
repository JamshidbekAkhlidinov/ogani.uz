<?php
namespace restapi\models;


class Xabarlar extends \common\models\Xabarlar{


    public function fields()
    {
        return [
            'name',
            'telefoni'=>'phone',
            'created_at'=>function($data){
                return date('d-m-Y H:i:s',$data->created_at);
            }
        ];
    }
    public function extraFields()
    {
        return [
            'text'
        ];
    }

    

}

?>