<?php

use common\models\ProductsImgs;
use yii\bootstrap4\Html;
use yii\helpers\Url;

if(isset($_SESSION['card'])){
?>
<table class="table table-bordered table-striped">
    <tr>
        <th>#</th>
        <th>Img</th>
        <th>Nomi</th>
        <th>Soni</th>
        <th>Narxi</th>
        <th>O'chirish</th>
    </tr>
    <?php


 $n=0;   foreach($_SESSION['card'] as $id=>$product):
 $n++;
 $img = ProductsImgs::findOne(['products_id'=>$id]);
    ?>

<tr>
            <td><?=$n?></td>
            <td><?=Html::img(url::to('/backend/web/imgs/products/'.$img->name),['width'=>'70px'])?></td>
            <td><?=$product['name']?></td>
            <td><?=$product['soni']?></td>
            <td><?=$product['price_new']?></td>
            <td><a href="#" class="ochirish text-success" onclick="del(<?=$id?>)"><i class="fa fa-trash"></i></a></td>
            
        </tr>

    <?php
    endforeach;
    ?>

    <tr>
        <th colspan="5">Maxsulotlar soni</th>
        <td><?=$_SESSION['card.soni']?></td>
    </tr>
    <tr>
        <th colspan="5">Maxsulotlar Narxi</th>
        <td><?=$_SESSION['card.sum']?></td>
    </tr>


</table>


<?php
    }else{
        ?>
<h2 class="alert alert-danger">Savat xali ham bo'sh</h2>
        <?php
    }
?>

