<?php


use backend\assets\AdminAsset;
use common\models\People;
use common\models\Xabarlar;
use lavrentiev\widgets\toastr\Notification;
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AdminAsset::register($this);

$user = Yii::$app->user->identity;

$xabarlarCount =  Xabarlar::find()->andWhere('status=0')->count();
$buyurtmaCount =  People::find()->andWhere('status=0')->count();

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">

            <a href="<?=url::home()?>" class="logo">

                <span class="logo-mini"><b>A</b>LT</span>

                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <nav class="navbar navbar-static-top">

                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=url::to('/backend/web/imgs/user/'.$user->img)?>" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?=$user->name??"Admin"?></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="<?=url::to('/backend/web/imgs/user/'.$user->img)?>" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        <?=$user->name??"Admin"?>
                                        <small><?=date('d-M Y', $user->created_at)?></small>
                                    </p>
                                </li>


                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?=url::to(['dashboard/profil'])?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=url::to(['dashboard/logout'])?>" class="btn btn-default btn-flat">Chiqish</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">

            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=url::to('/backend/web/imgs/user/'.$user->img)?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?=$user->name??"Admin"?></p>
                        <a href="<?=url::to(['dashboard/profil'])?>"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>



                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'dashboard/index',
                        ])){echo 'active';}?>">
                        <a href="<?=url::home()?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'shop-category/index',
                            'shop-category/create',
                            'shop-category/update',
                            'shop-category/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['shop-category/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Shop Category</span>
                        </a>
                    </li>
                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'shop/index',
                            'shop/create',
                            'shop/update',
                            'shop/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['shop/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Shop</span>
                        </a>
                    </li>

                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'people/index',
                            'people/create',
                            'people/update',
                            'people/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['people/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Buyurtmalar</span>
                            <span class="label label-primary pull-right"><?=$buyurtmaCount?></span>
                        </a>
                    </li>


                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'blog-category/index',
                            'blog-category/create',
                            'blog-category/update',
                            'blog-category/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['blog-category/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Blog-category</span>
                        </a>
                    </li>

                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'blog/index',
                            'blog/create',
                            'blog/update',
                            'blog/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['blog/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Blog</span>
                        </a>
                    </li>


                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'coments/index',
                            'coments/create',
                            'coments/update',
                            'coments/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['coments/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Komentariya</span>
                        </a>
                    </li>

                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'javoblar/index',
                            'javoblar/create',
                            'javoblar/update',
                            'javoblar/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['javoblar/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Javoblar</span>
                        </a>
                    </li>

                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'home/index',
                            'home/create',
                            'home/update',
                            'home/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['home/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Home</span>
                        </a>
                    </li>


                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'contactus/index',
                            'contactus/create',
                            'contactus/update',
                            'contactus/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['contactus/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Contactus</span>
                        </a>
                    </li>

                    <li class="<?php if(in_array(Yii::$app->controller->getRoute(),[
                            'xabarlar/index',
                            'xabarlar/create',
                            'xabarlar/update',
                            'xabarlar/view',
                        ])){echo 'active';}?>">
                        <a href="<?=url::to(['xabarlar/index'])?>">
                            <i class="fa fa-dashboard"></i> <span>Xabarlar</span>
                            <span class="label label-primary pull-right"><?=$xabarlarCount?></span>
                        </a>
                    </li>


                </ul>


            </section>

        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 2.0</small>
                </h1>
                <?php
                
                echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ;

                ?>
            </section>

           

            <section class="content">
                <?php if(!in_array(Yii::$app->controller->getRoute(),[
                    "dashboard/index",
                    "dashboard/profil",
                ])){?>
                <div class="box box-success box-header">
                    <?=$content?>
                </div>
                <?php }else{?>
                <?=$content?>
                <?php }?>

            </section>



        </div>



        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io/">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>


    </div>


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