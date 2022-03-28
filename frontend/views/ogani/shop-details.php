<?php

use common\models\Shop;
use yii\helpers\Url;
$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

$group4 = Shop::find()->andWhere('status=1')->andWhere("id!={$model->id}")->andWhere(['category_id'=>$model->category->id])->limit(4)->orderBy('created_at desc')->all();

?>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?=url::to('/backend/web/imgs/products/'.$model->imgs[0]->name)?>" alt="<?=$model->name?>">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php  foreach($model->imgs as $img):?>
                            <img data-imgbigurl="<?=url::to('/backend/web/imgs/products/'.$img->name)?>" src="<?=url::to('/backend/web/imgs/products/'.$img->name)?>" alt="<?=$model->name?>">
                          <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$model->name?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <!-- <span>(18 reviews)</span> -->
                        </div>
                        <div class="product__details__price">$<?=$model->price_new?></div>
                        <p><?=$model->content?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" id='soni'>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn addcardgroup" data-sum="<?=$model->price_new?>" data-id="<?=$model->id?>">ADD TO CARD</a>
                        <ul>
                            <li><b><?=yii::t('app','Shipping')?></b> <span><?=$model->shipping?></span></li>
                            <li><b><?=yii::t('app','Weight')?></b> <span><?=$model->weight?> kg</span></li>
                            <li><b><?=yii::t('app','Share on')?></b>
                                <div class="share">
                                <?php
                                    
                                    $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                                    $facebook = "https://www.facebook.com/sharer.php?s=100&amp;p[title]={$model->name}&amp;u={$url}&amp;t=".substr($model->content,0,100)."&amp;p[summary]=".substr($model->content,0,100)."&amp;p[url]={$url}";
                                    $tg = "https://telegram.me/share/url?url=$url";
                                    $twitter = "https://twitter.com/intent/tweet?url={$url}&amp;text=".substr($model->content,0,100);

                                    ?>
                                    <a href="<?=$facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="<?=$twitter?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="<?=$tg?>" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2><?=yii::t('app','Related Product')?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
               <?php  foreach($group4 as $pro) :?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?=url::to('/backend/web/imgs/products/'.$pro->imgs[0]->name)?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#" class="addcard" data-sum="<?=$pro->price_new?>" data-id="<?=$pro->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="<?=url::to(['ogani/shop-details','id'=>$pro->id])?>"><?=$pro->name?></a></h6>
                            <h5>$<?=$pro->price_new?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
   