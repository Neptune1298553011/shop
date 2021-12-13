<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42341f4574218a6deffcc408f92b2d50
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twinkle\\DI\\' => 11,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'Application\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twinkle\\DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/twinkle/di/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Core',
        ),
        'Application\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Application',
        ),
    );

    public static $classMap = array (
        'Application\\Controller\\ImgController' => __DIR__ . '/../..' . '/src/Application/Controller/ImgController.php',
        'Application\\Domain\\Img' => __DIR__ . '/../..' . '/src/Application/Domain/Img.php',
        'HttpHelper' => __DIR__ . '/../..' . '/src/Application/Helper/HttpHelper.php',
        'Application\\Model\\ImgModel' => __DIR__ . '/../..' . '/src/Application/Model/ImgModel.php',
        'Application\\Model\\Impl\\BaseModelImpl' => __DIR__ . '/../..' . '/src/Application/Model/Impl/BaseModelImpl.php',
        'Application\\Model\\Impl\\ImgModelImpl' => __DIR__ . '/../..' . '/src/Application/Model/Impl/ImgModelImpl.php',
        'Application\\Service\\ImgService' => __DIR__ . '/../..' . '/src/Application/Service/ImgService.php',
        'Application\\Service\\Impl\\ImgServiceImpl' => __DIR__ . '/../..' . '/src/Application/Service/Impl/ImgServiceImpl.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Core\\Container\\CoreContainer' => __DIR__ . '/../..' . '/src/Core/Container/CoreContainer.php',
        'Core\\Exception\\CoreContainerNotFoundException' => __DIR__ . '/../..' . '/src/Core/Exception/CoreContainerNotFoundException.php',
        'Core\\HandlerCore' => __DIR__ . '/../..' . '/src/Core/HandlerCore.php',
        'Psr\\Container\\ContainerExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerExceptionInterface.php',
        'Psr\\Container\\ContainerInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerInterface.php',
        'Psr\\Container\\NotFoundExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/NotFoundExceptionInterface.php',
        'Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php',
        'Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php',
        'Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php',
        'Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php',
        'Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php',
        'Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php',
        'Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php',
        'Twinkle\\DI\\AbstractContainer' => __DIR__ . '/..' . '/twinkle/di/src/AbstractContainer.php',
        'Twinkle\\DI\\Container' => __DIR__ . '/..' . '/twinkle/di/src/Container.php',
        'Twinkle\\DI\\Exception\\ContainerException' => __DIR__ . '/..' . '/twinkle/di/src/Exception/ContainerException.php',
        'Twinkle\\DI\\Exception\\NotFoundException' => __DIR__ . '/..' . '/twinkle/di/src/Exception/NotFoundException.php',
        'Twinkle\\DI\\ServiceLocatorTrait' => __DIR__ . '/..' . '/twinkle/di/src/ServiceLocatorTrait.php',
        'Twinkle\\DI\\Tools' => __DIR__ . '/..' . '/twinkle/di/src/Tools.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42341f4574218a6deffcc408f92b2d50::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42341f4574218a6deffcc408f92b2d50::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit42341f4574218a6deffcc408f92b2d50::$classMap;

        }, null, ClassLoader::class);
    }
}
