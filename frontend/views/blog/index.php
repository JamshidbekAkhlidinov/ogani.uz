<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
$this->title = "Blog";
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
               <?php include_once "blog_category.php" ?>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <?php 
                        if(count($model)>0){
                        foreach($model as $blog):?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?=url::to('/backend/web/imgs/blogs/'.$blog->img)?>" alt="<?=$blog->title?>">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?=date('M d, Y')?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="<?=url::to(['blog/blog-details','id'=>$blog->id])?>"><?=$blog->title?></a></h5>
                                    <p><?=substr($blog->content,0,30)?></p>
                                    <a href="<?=url::to(['blog/blog-details','id'=>$blog->id])?>" class="blog__btn">Davomini o'qish <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;
                        ?>

                        <div class="col-lg-12">
                            <?php echo LinkPager::widget([
                                   'pagination'=>$page,
                            ]);
                            ?>
                        </div>
                    </div>
                    <?php
                    }else{
                        echo "<h3 class='alert alert-danger'>Bu bolim bo'sh</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
