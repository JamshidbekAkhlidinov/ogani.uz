<?php

use common\models\Coments;
use common\models\Javoblar;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
$this->title = "Blogs-details";
$this->params['breadcrumbs'][] = $this->title;
$coments = Coments::find()->where(['category_id'=>2])->andWhere(['owner_id'=>$model->id]);
Modal::begin([
    'title' => '<h2>Komentariya qoldirishingiz mumkun</h2>',
    'id'=>'modalcoments',
    'size'=>'modal-lg',
]);

echo '<div class="comentsbody"></div>';

Modal::end();

?>

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?=url::to('@web/img/blog/details/details-hero.jpg')?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2><?=$model->title?></h2>
                        <ul>
                            <li>By <?=$model->createdBy->username?></li>
                            <li><?=date('M d, Y',$model->created_at)?></li>
                            <li><?=count($coments->all())?> Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
            <?php include_once "blog_category.php" ?>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="<?=url::to('/backend/web/imgs/blogs/'.$model->img)?>" width="100%" alt="">
                        <h3><?=$model->title?></h3>
                        <p><?=str_replace("\n","<br>",$model->content)?></p>
                        <h6 class="text-right" style="cursor: pointer;" id="comentsbutton"  data-id="<?=$model->id?>"><i class="fa fa-clipboard" aria-hidden="true"></i> Komentariya yozish</h6>
                    </div>

                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories: </span><?=$model->category->category_name?></li>
                                        <!-- <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li> -->
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>

                            <h3 class="pt-4">Kometariyalar:</h3>
                            <?php 
                            
                            if(count($coments->andwhere(['status'=>1])->all())>0){
                            foreach($coments->andwhere(['status'=>1])->limit(5)->all() as $coment):?>
                            <div class="col-lg-12">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__text">
                                        <h6><?=$coment->name?></h6>
                                        <span class="p-4"><?=$coment->text?></span>
                                    </div>
                                </div>
                            </div>
                            <?php foreach(Javoblar::find()->orderBy('id desc')->andWhere(['coments_id'=>$coment->id])->limit(5)->all() as $reply):?>
                            <div class="col-lg-12 pt-2">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="<?=url::to('/backend/web/imgs/user/'.$model->createdBy->img)?>" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6><?=$model->createdBy->name?></h6>
                                        <span class="p-4"><?=$reply->text?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <?php endforeach;
                            }else{
                                echo "<h3 class='pt-4'>Komentariyalar mavjud emas</h3>";
                            }
                            ?>

                            



                         


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=url::to('@web/img/blog/blog-1.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=url::to('@web/img/blog/blog-2.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=url::to('@web/img/blog/blog-3.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
