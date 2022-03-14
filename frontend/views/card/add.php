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

use yii\helpers\Url;

if(isset($_SESSION['card'])){
 $n=0;   foreach($_SESSION['card'] as $id=>$product):
 $n++;
    ?>

<tr>
            <td><?=$n?></td>
            <td><?=$product['img']?></td>
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

<?php
}
?>




</table>