<?php
namespace restapi\models;

use common\models\User;

class Users extends User
{

    public function fields()
    {
        return [
            'username',
            'parol'=>'password_hash',
            'email',
        ];
    }




}

?>