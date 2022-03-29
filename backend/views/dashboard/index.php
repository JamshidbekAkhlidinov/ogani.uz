<?php

use common\models\Blog;
use common\models\People;
use common\models\Shop;
use common\models\Xabarlar;
use yii\helpers\Url;

$xabarlarCount =  Xabarlar::find()->andWhere('status=0')->count();
$buyutma =  People::find()->andWhere('status=0');
$tovarlar = Shop::find()->limit(10)->all();
$Bloglar = Blog::find()->count();

?>

<div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-car"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Buyurtmalar</span>
                <span class="info-box-number"><?=$buyutma->count();?><small> ta</small></span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa  fa-comments"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Xabarlar</span>
                <span class="info-box-number"><?=$xabarlarCount?> <small>ta</small></span>
            </div>

        </div>

    </div>


    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Tovarlar</span>
                <span class="info-box-number"><?=count($tovarlar)?> <small>ta</small></span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Bloglar</span>
                <span class="info-box-number"><?=$Bloglar?> <small>ta</small></span>
            </div>

        </div>

    </div>

</div>




<div class="row">

    <div class="col-md-8">


        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Buyurtmalar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($buyutma->all() as $buyurtma): ?>
                            <tr>
                                <td><a href="<?=url::to(['people/view','id'=>$buyurtma->id])?>"><?=$buyurtma->id?></a></td>
                                <td><a href="<?=url::to(['people/view','id'=>$buyurtma->id])?>"><?=$buyurtma->first_name?></a></td>
                                <td><span class="label label-success"><?=$buyurtma->status==0?"Yangi":"Ko'rilgan    "?></span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <?php
                                        $orders = $buyurtma->orders;
                                        foreach ($orders as $order){
                                            echo $order->id.", ";
                                        }
                                        
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?php  endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>

            <div class="box-footer clearfix">
                <a href="<?=url::to(['people/index'])?>" class="btn btn-sm btn-default btn-flat pull-right">Hamma Buyurtmalar</a>
            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Yaqinda qo'shilgan mahsulotlar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    <?php foreach($tovarlar as $tovar): ?>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?=Url::to("/backend/web/imgs/products/".$tovar->imgs[0]->name)?>" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a href="<?=url::to(['shop/view','id'=>$tovar->id])?>" class="product-title"><?=$tovar->name?>
                                <span class="label label-success pull-right">$<?=$tovar->price_new?></span></a>
                            <span class="product-description">
                            <?=substr($tovar->content,0,30)?>
                            </span>
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <div class="box-footer text-center">
                <a href="<?=url::to(['shop/index'])?>" class="uppercase">View All Products</a>
            </div>

        </div>

    </div>

</div>