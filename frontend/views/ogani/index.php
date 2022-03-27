<?php

use common\models\Blog;
use common\models\Shop;
use common\models\ShopCategory;
use yii\helpers\Url;
$shopCat = ShopCategory::find()->andWhere('status=1');
$blogLimi3 = Blog::find()->andWhere('status=1')->orderBy('created_at desc')->limit(3)->all();
$products = Shop::find()->andWhere('status=1')->limit(8)->all();
?>
  <!-- Categories Section Begin -->
  <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach($shopCat->limit(20)->all() as $cat): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?=url::to('/backend/web/imgs/shopcategory/'.$cat->img)?>">
                            <h5><a href="<?=url::to(['ogani/category','id'=>$cat->id])?>"><?=$cat->category_name?></a></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

 <!-- Featured Section Begin -->
 <section class="featured spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <h2>Featured Product</h2>
                 </div>
                 <div class="featured__controls">
                     <ul>
                         <li class="active" data-filter="*">All</li>
                         <?php  foreach($shopCat->limit(6)->all() as $shopc):?>
                         <li data-filter=".<?= str_replace(' ','-',strtolower($shopc->category_name))?>"><?=$shopc->category_name?></li>
                         <?php endforeach;?>

                     </ul>
                 </div>
             </div>
         </div>
         <div class="row featured__filter">
             <?php foreach($products as $product): ?>
             <div class="col-lg-3 col-md-4 col-sm-6 mix <?= str_replace(' ','-',strtolower($product->category->category_name))?>">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="<?=url::to(['/backend/web/imgs/products/'.$product->imgs[0]->name])?>">
                         <ul class="featured__item__pic__hover">
                             <li><a href="#" class="addcard" data-sum="<?=$product->price_new?>" data-id="<?=$product->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="<?=url::to(['ogani/shop-details','id'=>$product->id])?>"><?=$product->name?></a></h6>
                         <h5>$<?=$product->price_new?></h5>
                     </div>
                 </div>
             </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>
 <!-- Featured Section End -->

 <!-- Banner Begin -->
 <div class="banner">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="banner__pic">
                     <img src="img/banner/banner-1.jpg" alt="">
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="banner__pic">
                     <img src="img/banner/banner-2.jpg" alt="">
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Banner End -->


 <!-- Blog Section Begin -->
 <section class="from-blog spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title from-blog__title">
                     <h2>From The Blog</h2>
                 </div>
             </div>
         </div>
         <div class="row">
            <?php foreach($blogLimi3  as $blog3): ?>
             <div class="col-lg-4 col-md-4 col-sm-6">
                 <div class="blog__item">
                     <div class="blog__item__pic">
                         <img src="<?=url::to('/backend/web/imgs/blogs/'.$blog3->img)?>" alt="">
                     </div>
                     <div class="blog__item__text">
                         <ul>
                             <li><i class="fa fa-calendar-o"></i> <?=date('M d, Y',$blog3->created_at)?></li>
                             <li><i class="fa fa-comment-o"></i> 5</li>
                         </ul>
                         <h5><a href="<?=url::to(['blog/blog-details','id'=>$blog3->id])?>"><?=$blog3->title?></a></h5>
                         <p><?=substr($blog3->content,0,50)?></p>
                     </div>
                 </div>
             </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>
 <!-- Blog Section End -->