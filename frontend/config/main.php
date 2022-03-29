<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language'=>'uz',
    'homeUrl'=>'/',
    'defaultRoute'=>'ogani/index',
    'layout'=>'ogani',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'container' => [
        'definitions' => [
           \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
        ],
     ],
    'components' => [
        'request' => [
            'baseUrl'=>'/',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'baseUrl'=>'/',
            'class' => 'yeesoft\multilingual\web\MultilingualUrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                '<action:(login|logout)>' => 'site/<action>',
                '<language:([a-zA-Z-]{2,5})?>' => 'ogani/index',
                '<language:([a-zA-Z-]{2,5})?>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
            'excludedActions' => [
                'site/login',
                'site/logout',
            ],
            'languages' => [
                'ru' => 'Ruscha',
                'uz' => 'Uzbek',
            ],
            'languageRedirects' => [
                // 'en-US' => 'en',
            ],
        ],
        'assetManager' => [
            // override bundles to use CDN :
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '',
                    'js' => [
                        'js/jquery-3.3.1.min.js',
                    ],
                ],
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '',
                    'css' => [
                        'css/bootstrap.min.css',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
