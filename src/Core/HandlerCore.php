<?php

namespace Core;

use Core\Exception\CoreContainerNotFoundException;
use Psr\Container\ContainerInterface;

class HandlerCore
{
    // 路由
    protected $router = [];
    // 容器
    protected $container;

    public function __construct( ContainerInterface $container = null)
    {
        if (is_null($container)){
            $this->container = new CoreContainerNotFoundException();
        }else{
            $this->container = $container;
        }

    }

    public  function run(){
        $uri = $this->getUri();
        $url =  "";
        if (strpos($uri, "?")){
            $url = substr($uri,0,strpos($uri, "?"));
        }else{
            $url =  $uri;
        }
        $handle = $this->router[$url];
        $clazz = substr($handle,0,strpos($handle,':'));
        $invoke = $this->container->get($clazz);
        $method= substr($handle,strpos($handle,':')+1);
        echo  $invoke->$method(22);
    }

    public function instance($clazz){

    }
    /**
     * @param mixed $router
     */
    public function setRouter($router): void
    {
        $this->router = $router;
    }

    public function getUri(){
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }

    /**
     * @return CoreContainerNotFoundException|ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}