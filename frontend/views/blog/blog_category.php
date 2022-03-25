<?php

use common\models\Blog;
use common\models\BlogCategory;
use yii\helpers\Url;

$catgeory = BlogCategory::find()->orderBy('created_at DESC')->limit(10)->all();
$blog3 = Blog::find()->orderBy('created_at DESC')->limit(3)->where('status=1')->all();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = 0;
}
?>

<div class="col-lg-4 col-md-5">
    <div class="blog__sidebar">
        <div class="blog__sidebar__search">
            <form action="<?=url::to(['blog/index'])?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="blog__sidebar__item">
            <h4>Categories</h4>
            <ul>
                <li class="pl-3" style="<?php if($id==0){echo "background-color: #7fad39;";}else{"";}?>"><a style="color: black;"  href="<?=url::to(['blog/index','id'=>0])?>">Hammasi</a></li>
                <?php foreach($catgeory as $cat):    
                ?>
                <li class="pl-3" style="<?php if($id==$cat->id){echo "background-color: #7fad39;";}else{"";}?>"><a style="color: black;" href="<?=url::to(['blog/index','id'=>$cat->id])?>"><?=$cat->category_name?> (<?=$cat->getBlogsCount()?>)</a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="blog__sidebar__item">
            <h4>Recent News</h4>
            <div class="blog__sidebar__recent">
                <?php foreach($blog3 as $blog):?>
                <a href="<?=url::to(['blog/blog-details','id'=>$blog->id])?>" class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <img src="<?=url::to('/backend/web/imgs/blogs/'.$blog->img)?>" width="100px" alt="">
                    </div>
                    <div class="blog__sidebar__recent__item__text">
                        <h6><?=$blog->title?></h6>
                        <span><?=date('M d, Y',$blog->created_at)?></span>
                    </div>
                </a>
                <?php endforeach;?>
               
               
            </div>
        </div>
        <!-- <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div> -->
    </div>
</div>