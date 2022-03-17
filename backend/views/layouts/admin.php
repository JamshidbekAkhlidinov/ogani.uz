<?php


use backend\assets\AdminAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AdminAsset::register($this);

$user = Yii::$app->user->identity;

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

            <a href="index2.html" class="logo">

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

                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>



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


                </ul>


            </section>

        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 2.0</small>
                </h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol> -->
                <?php
                
                echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) 

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

        <aside class="control-sidebar control-sidebar-dark">


            <div class="tab-content">

                <div  id="control-sidebar-home-tab">
                   

                </div>

            </div>
        </aside>


        <div class="control-sidebar-bg"></div>
    </div>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();