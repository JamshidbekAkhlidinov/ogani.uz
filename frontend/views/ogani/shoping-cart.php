<?php

use common\models\ProductsImgs;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$this->title = "Shop- Card ";
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="shoping__cart__table">



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


if(isset($_SESSION['card'])){
 $n=0;   foreach($_SESSION['card'] as $id=>$product):
    $img = ProductsImgs::findOne(['products_id'=>$id]);

 $n++;
    ?>

                        <tr>
                            <td><?=$n;?></td>
                            <td><?=Html::img(url::to('/backend/web/imgs/products/'.$img->name),['width'=>'100px'])?></td>
                            <td><?=$product['name']?></td>
                            <td><?=$product['soni']?></td>
                            <td><?=$product['price_new']?></td>
                            <td><a href="#" class="ochirish text-success" onclick="del(<?=$id?>)"><i
                                        class="fa fa-trash"></i></a></td>

                        </tr>

                        <?php
    endforeach;
    ?>

                       
                        <?php
}
?>




                    </table>

                </div>
            </div>
        </div>
        <div class="row">
 
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5><?=yii::t('app','Cart Total')?></h5>
                    <ul>
                        <li><?=yii::t('app','Maxsulotlar soni')?> <span><?=$_SESSION['card.soni']?> ta</span></li>
                        <li><?=yii::t('app','Maxsulotlar Narxi')?> <span>$<?=$_SESSION['card.sum']?></span></li>
                    </ul>
                    <a href="<?=url::to(['ogani/checkout'])?>" class="primary-btn"><?=yii::t('app','Buyurtma qilish')?></a>
                </div>
            </div>
        </div>
    </div>
</section>
