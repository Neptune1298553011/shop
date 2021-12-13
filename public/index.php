<?php

$load = require __DIR__ . '/../vendor/autoload.php';



// 设置路由
$route = [
    '/shop/home' => \Application\Controller\ImgController::class . ":productDetail",
    '/' => \Application\Controller\ImgController::class . ":productDetail",
    '/shop/product/img/remove' => \Application\Controller\ImgController::class . ":removeProduct",
    '/shop/product/list' => \Application\Controller\ProductController::class . ":findAllProduct"
];

// 设置容器依赖
$DI = [
    \Application\Service\ImgService::class => \Application\Service\Impl\ImgServiceImpl::class,
    \Application\Model\ImgModel::class => \Application\Model\Impl\ImgModelImpl::class,
    \Application\Service\ProductService::class => \Application\Service\Impl\ProductServiceImpl::class,
    \Application\Model\ProductModel::class => \Application\Model\Impl\ProductModelImpl::class
];

// 设置容器
$container = new \Core\Container\CoreContainer($DI);
$container->add([
        PDO::class => function () {
            $dsn = 'mysql:host=127.0.0.1;dbname=igg;charset=utf8;port=3306';
            $user = 'admin';
            $pass = '123456';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //错误模式
                PDO::ATTR_CASE => PDO::CASE_NATURAL, // 自然名称
                PDO::ATTR_EMULATE_PREPARES => true, // 启用模拟功能
                PDO::ATTR_PERSISTENT => true,
                PDO::ERRMODE_EXCEPTION => true // 抛出异常
            ];
            $pdo = new PDO($dsn, $user, $pass, $options);
            return $pdo;
        },
    ]
);

// 处理请求
$core = new \Core\HandlerCore($container);
$core->setRouter($route);
$core->run();



