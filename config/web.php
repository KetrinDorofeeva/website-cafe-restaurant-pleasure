<?php
    $params = require __DIR__ . '/params.php';
    $db = require __DIR__ . '/db.php';

    $config = [
        'id' => 'basic',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log'],
        'language' => 'ru-Ru',
        'aliases' => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
        ],
        'components' => [
            'request' => [
                'cookieValidationKey' => 'yGGV854459988bjbbjbjAGFDSFjjhgh7667587FCCGGBfSEE',
                'baseUrl' => '',
            ],
            'cart' => [
                'class' => 'devanych\cart\Cart',
                'storageClass' => 'devanych\cart\storage\CookieStorage',
                'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
                'params' => [
                    'key' => 'cart',
                    'expire' => 604800,
                    'productClass' => 'app\models\Product',
                    'productFieldId' => 'id',
                    'productFieldPrice' => 'price',
                ],
            ],
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
            'user' => [
                'identityClass' => 'app\models\User',
                'enableAutoLogin' => true,
            ],
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.yandex.ru',
                    'username' => 'multiveb@yandex.ru',
                    'password' => '',
                    'port' => '465',
                    'encryption' => 'ssl',
                ],
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
            'db' => $db,
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                    //Назначить товару "Ожидают" (У отдельного заказчика)
                    [
                        'pattern' => 'clientorder/waitingproduct/<id>',
                        'route' => 'clientorder/waitingproduct',
                    ],

                    //Назначить товару "В процессе" (У отдельного заказчика)
                    [
                        'pattern' => 'clientorder/inprogressproduct/<id>',
                        'route' => 'clientorder/inprogressproduct',
                    ],

                    //Назначить товару "Готово" (У отдельного заказчика)
                    [
                        'pattern' => 'clientorder/doneproduct/<id>',
                        'route' => 'clientorder/doneproduct',
                    ],

                    //Назначить бронирующему "Ожидают"
                    [
                        'pattern' => 'clientbooking/waitingbooking/<id>',
                        'route' => 'clientbooking/waitingbooking',
                    ],

                    //Назначить бронирующему "В процессе"
                    [
                        'pattern' => 'clientbooking/inprogressbooking/<id>',
                        'route' => 'clientbooking/inprogressbooking',
                    ],

                    //Назначить бронирующему "Готово"
                    [
                        'pattern' => 'clientbooking/donebooking/<id>',
                        'route' => 'clientbooking/donebooking',
                    ],

                    //Товары в категории
                    [
                        'pattern' => 'site/products/<id>',
                        'route' => 'site/products',
                    ],

                    //Подкатегория (напитки)
                    [
                        'pattern' => 'site/undercategories/<id>',
                        'route' => 'site/undercategories',
                    ],

                    //Товары в подкатегории
                    [
                        'pattern' => 'site/underproducts/<id>',
                        'route' => 'site/underproducts',
                    ],

                    //Товары акции
                    [
                        'pattern' => 'site/stocksproducts/<id>',
                        'route' => 'site/stocksproducts',
                    ],

                    //Добавить товар в корзину
                    [
                        'pattern' => 'site/add/<id>',
                        'route' => 'site/add',
                    ],

                    //Добавить товар из подменю в корзину
                    [
                        'pattern' => 'site/addunderproduct/<id>',
                        'route' => 'site/addunderproduct',
                    ],
                ],
            ],
        ],
        'params' => $params,
    ];

    if (YII_ENV_DEV) {
        // configuration adjustments for 'dev' environment
        $config['bootstrap'][] = 'debug';
        $config['modules']['debug'] = [
            'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ];

        $config['bootstrap'][] = 'gii';
        $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ];
    }

    return $config;
?>
