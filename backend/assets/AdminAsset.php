<?php

namespace backend\assets;

use yii\web\AssetBundle;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/jvectormap/jquery-jvectormap.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
    ];
    public $js = [
    'bower_components/bootstrap/dist/js/bootstrap.min.js',
    'bower_components/fastclick/lib/fastclick.js',
    'dist/js/adminlte.min.js',
    'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
    'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'bower_components/chart.js/Chart.js',
    'dist/js/pages/dashboard2.js',
    'dist/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
