<?php

use common\models\Contactus;
use common\models\Home;
use frontend\assets\OganiAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
OganiAsset::register($this);
use yeesoft\multilingual\widgets\LanguageSwitcher;

if(isset($_GET['id'])){
    $idCategory = $_GET['id'];
}else{
    $idCategory = 0;
}

$contact =  Contactus::find()->limit(1)->orderBy('id desc')->one();
$home = Home::find()->limit(1)->orderBy('id desc')->one();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$this->title?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>


    <?php
    
    Modal::begin([
        'title' => '<h2>Siz tanlagan maxsulotlar</h2>',
        'id'=>'MyModal',
        'size'=>'modal-lg',
        'footer'=>' <button type="submit" class="btn btn-danger clear" onclick="tozalash()">Hammasini o`chirish</button>
        <a href="'.url::to(['ogani/shoping-cart']).'" class="btn btn-primary">Buyurtma qilish</a>',
        ]);
    
    echo '<div class="modalcontent"></div>';
    
    Modal::end();
    
    ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=url::home()?>"><img src="<?=url::to('/backend/web/imgs/home/'.$contact->logo)?>" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="" class="show"><i class="fa fa-shopping-bag"></i>
                        <span id="cardSoni"><?=isset($_SESSION['card.soni'])?$_SESSION['card.soni']:"0"?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span id="sumCard2"><?=isset($_SESSION['card.sum'])?$_SESSION['card.sum']:"0"?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <div>
                    <?=(Yii::$app->language=='uz')?"<span class='fi fi-uz'></span> Uzbek":"<span class='fi fi-ru'></span> Ruscha"?>
                </div>
                <span class="arrow_carrot-down"></span>
                <?php

                                echo LanguageSwitcher::widget([
                                    'languages' => [
                                        'ru' => 'Ruscha',
                                        'uz' => 'Uzbek',
                                    ],
                                    'languageRedirects' => [
                                        // 'uz' => 'Uzbek',
                                    ]
                                ]);
                                ?>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> <?=Yii::t('app','Login')?></a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/index')?'active':''?>"><a href="<?=url::home()?>"><?=Yii::t('app','Home')?></a></li>
            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/shop-grid')?'active':''?>"><a href="<?=url::to(['ogani/shop-grid'])?>"> <?=Yii::t('app','Shop')?></a></li>
            <li class="<?=(Yii::$app->controller->getRoute()=='blog/index')?'active':''?>"><a href="<?=url::to(['blog/index'])?>"> <?=Yii::t('app','Blog')?></a></li>
            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/contact')?'active':''?>"><a href="<?=url::to(['ogani/contact'])?>"> <?=Yii::t('app','Contact')?></a></li>
        </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i><?=$contact->email?></li>
                <li><?=yii::t('app','Free Shipping for all Order of $99')?></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i><?=$contact->email?></li>
                                <li><?=yii::t('app','Free Shipping for all Order of $99')?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <div>
                                    <?=(Yii::$app->language=='uz')?"<span class='fi fi-uz'></span> Uzbek":"<span class='fi fi-ru'></span> Ruscha"?>
                                </div>
                                <span class="arrow_carrot-down"></span>
                                <?php


                                echo LanguageSwitcher::widget([
                                    'languages' => [
                                        'ru' => 'Ruscha',
                                        'uz' => 'Uzbek',
                                    ],
                                    'languageRedirects' => [
                                        // 'uz' => 'Uzbek',
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> <?=yii::t('app','Login')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=url::home()?>"><img src="<?=url::to('/backend/web/imgs/home/'.$contact->logo)?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/index')?'active':''?>"><a href="<?=url::home()?>"><?=Yii::t('app','Home')?></a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/shop-grid')?'active':''?>"><a href="<?=url::to(['ogani/shop-grid'])?>"><?=yii::t('app','Shop')?></a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='blog/index')?'active':''?>"><a href="<?=url::to(['blog/index'])?>"><?=yii::t('app','Blog')?></a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/contact')?'active':''?>"><a href="<?=url::to(['ogani/contact'])?>"><?=yii::t('app','Contact')?></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="" class="show"><i class="fa fa-shopping-bag"></i>
                                    <span id="cardSoni2"><?=isset($_SESSION['card.soni'])?$_SESSION['card.soni']:"0"?></span>
                            </a></li>

                        </ul>
                        <div class="header__cart__price">item: <span id="sumCard1"><?=isset($_SESSION['card.sum'])?$_SESSION['card.sum']:"0"?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span><?=yii::t('app','All departments')?></span>
                        </div>

                        <?php

                            if(Yii::$app->controller->getRoute()=='ogani/index'){
                                $style = "";
                            }else{
                                $style ='display:none;';
                                echo " <style>
                                .royxat{
                                    position: absolute;
                                    width: 90%;
                                    z-index: 9;
                                    background-color: white;
                                }
                            </style>";
                            }
            
                        ?>
                        <ul style='<?=$style?>' class="royxat">
                            <?php
                               include_once "shop_category.php";
                               ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <?php
                            if(in_array(Yii::$app->controller->getRoute(),[
                                'ogani/shop-grid',
                                'ogani/index',
                                'ogani/category',
                                'ogani/contact',
                                'ogani/shop-details', 
                            ])){
                                $joy = 'ogani/category';
                            }else{
                                $joy = 'blog/index';
                            }
                            ?>
                            <form action="<?=url::to([$joy])?>">
                                <input type="hidden" name="id" value="<?=$idCategory?>">
                                <input type="text" name="search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn"><?=yii::t('app','SEARCH')?></button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?=$contact->phone?></h5>
                                <span><?=$contact->support_time?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(Yii::$app->controller->getRoute()=='ogani/index'){
                    ?>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span><?=$home->text?></span>
                            <h2><?=$home->title?></h2>
                            <p><?=$home->subtitle?></p>
                            <a href="<?=url::to(['ogani/shop-grid'])?>" class="primary-btn" ><?=$home->btn_name?></a>
                        </div>
                    </div>

                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <?php if(Yii::$app->controller->getRoute()!=='ogani/index' and Yii::$app->controller->getRoute()!=='blog/blog-details' ): ?>
    <section class="breadcrumb-section set-bg" data-setbg="<?=url::to('@web/img/breadcrumb.jpg')?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?=$this->title?></h2>
                        <style>
                            .breadcrumb {
                                background-color: rgba(122, 222, 222, 0);
                            }
                        </style>
                        <?php
                                       echo Breadcrumbs::widget([
                                        'itemTemplate' => "\t{link}\n", // template for all links
                                        'activeItemTemplate' => "\t<span>{link}</span>\t\n",
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        'options'=>[
                                            'class'=>'breadcrumb__option',
                                            'style' => 'display: table; margin: 0 auto;'//добавили

                                        ]

                                    ]);
                                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif?>

    <?=$content?>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?=url::home()?>"><img src="<?=url::to('/backend/web/imgs/home/'.$contact->logo)?>" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: <?=$contact->address?></li>
                            <li>Phone: <?=$contact->phone?></li>
                            <li>Email: <?=$contact->email?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6><?=yii::t('app','Join Our Newsletter Now')?></h6>
                        <p><?=yii::t('app','Get E-mail updates about our latest shop and special offers.')?></p>
                        <form action="#">
                            <input type="text" placeholder="<?=yii::t('app','Enter your mail')?>">
                            <button type="submit" class="site-btn"><?=yii::t('app','Subscribe')?></button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="<?=url::to('@web/img//payment-item.png')?>"
                                alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();