<?php
namespace frontend\models;

use yii\base\Model;

class Card extends Model{

    public function AddToCard($products,$soni=1){

        if(isset($_SESSION['card'][$products->id])){
            $_SESSION['card'][$products->id]['soni']+=$soni;
        }else{
            $_SESSION['card'][$products->id] = [
                'soni' =>$soni,
                'name'=>$products->name,
                'price_new'=>$products->price_new,
                'img'=>$products->img,  
            ];
        }

        $_SESSION['card.soni'] = isset($_SESSION['card.soni'])?$_SESSION['card.soni'] +=$soni:$_SESSION['card.son'] = $soni;
        $_SESSION['card.sum'] = isset($_SESSION['card.sum'])?$_SESSION['card.sum'] +=($soni*$products->price_new):$_SESSION['card.sum'] = $soni*$products->price_new;

    }

    public function DelItem($id){

        $soniAyir = $_SESSION['card'][$id]['soni'];
        $sumAyir = $_SESSION['card'][$id]['price_new'];

        $_SESSION['card.soni'] -=$soniAyir;
        $_SESSION['card.sum']  -=$sumAyir*$soniAyir ;

        unset($_SESSION['card'][$id]);



    }





}

?>