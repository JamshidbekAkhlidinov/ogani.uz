<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'layout'=>'admin',
    'language'=>'uz',
    'defaultRoute'=>'dashboard/index',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'homeUrl'=>'/admin',
    'modules' => [
        'telegrambot' => [
            'class' => 'backend\modules\telegrambot\Modules',
        ],
        'translate-manager' => [
            'class' => 'wokster\translationmanager\TranslationManager',
            'languages' => ['uz','ru'],
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl'=>'/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'baseUrl'=>'/admin',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'assetManager' => [
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                    'css' => [
                        'bower_components/bootstrap/dist/css/bootstrap.min.css',
                    ]
                ],
            ],
        ],

    ],
    'params' => $params,
];
