<?php



use frontend\assets\OganiAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
OganiAsset::register($this);
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
            <a href="#"><img src="<?=url::to('@web/img/logo.png')?>" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="" class="show"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?=url::to('@web/img//language.png')?>" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?=url::home()?>">Home</a></li>
                <li><a href=shop-grid">Shop</></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href=shop-details">Shop Details</a></li>
                        <li><a href=shoping-cart">Shoping Cart</a></li>
                        <li><a href=checkout">Check Out</a></li>
                        <li><a href=blog-details">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href=blog">Blog</a></li>
                <li><a href=contact">Contact</a></li>
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
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
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
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
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
                                <div><?=(Yii::$app->language=='uz')?"<span class='fi fi-uz'></span> Uzbek":"<span class='fi fi-ru'></span> Ruscha"?></div>
                                <span class="arrow_carrot-down"></span>
                                <?php

                                use yeesoft\multilingual\widgets\LanguageSwitcher;

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
                                <a href="#"><i class="fa fa-user"></i> Login</a>
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
                        <a href="<?=url::home()?>"><img src="<?=url::to('@web/img//logo.png')?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/index')?'active':''?>"><a href="<?=url::home()?>">Home</a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/shop-grid')?'active':''?>"><a href="<?=url::to(['ogani/shop-grid'])?>">Shop</a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/pages')?'active':''?>"><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="<?=url::to(['ogani/shop-details'])?>">Shop Details</a></li>
                                    <li><a href="<?=url::to(['ogani/shoping-cart'])?>">Shoping Cart</a></li>
                                    <li><a href="<?=url::to(['ogani/checkout'])?>">Check Out</a></li>
                                    <li><a href="<?=url::to(['blog/blog-details'])?>">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='blog/index')?'active':''?>"><a href="<?=url::to(['blog/index'])?>">Blog</a></li>
                            <li class="<?=(Yii::$app->controller->getRoute()=='ogani/contact')?'active':''?>"><a href="<?=url::to(['ogani/contact'])?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#" class="show"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
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
                            <span>All departments</span>
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
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(Yii::$app->controller->getRoute()=='ogani/index'){
                    ?>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>

                    <?php }?>
                </div>
            </div>
           <?php if(Yii::$app->controller->getRoute()!=='ogani/index' and Yii::$app->controller->getRoute()!=='blog/blog-details' ): ?>
            <section class="breadcrumb-section set-bg" data-setbg="<?=url::to('@web/img/breadcrumb.jpg')?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="breadcrumb__text">
                                        <h2><?=$this->title?></h2>
                                       <style>
                                          .breadcrumb{
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
        </div>
    </section>
    <!-- Hero Section End -->

    <?=$content?>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?=url::home()?>"><img src="<?=url::to('@web/img//logo.png')?>" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
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
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
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
                        <div class="footer__copyright__payment"><img src="<?=url::to('@web/img//payment-item.png')?>" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();