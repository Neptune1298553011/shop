<?php

namespace Core\Container;

use Core\Exception\CoreContainerNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class CoreContainer implements  ContainerInterface
{
    public $DI = [];
    public $instance = [];
    public function __construct($DI)
    {
        $this->DI = $DI;
    }

    public function getInstanceByClazz(){

    }

    /**
     * 默认通过类名获取
     * @param $id
     * @return mixed|void
     */
    public function get($id)
    {

        if (!$this->has($id)) {
            $this->instance[$id] = $this->instanceClazz($id);
        }
        return $this->instance[$id];

    }

    public function has($id)
    {
       return !empty($this->instance[$id]);
    }

    public function instanceClazz($clazz){
        $reflect = new \ReflectionClass($clazz);
        $constructor = $reflect->getConstructor ();
        $params = $constructor->getParameters();
        if (empty($params)){
            return new $clazz();
        }else {
            $args = [];

            foreach ($params as $param){
                $paramClazz = $param->getClass();
                $name = $paramClazz->getName();
                if (array_key_exists($name,$this->instance)){
                   if (is_callable($this->instance[$name])) {
                       $args[$param->getName() ] = $this->instance[$name]();
                   }else{
                       $args[$param->getName() ] = $this->instance[$name];
                   }

                }else if (array_key_exists($name,$this->DI)){ // 如果是接口的话
                    $paramClazz = $this->DI[$name];
                    $args[$param->getName() ] = $this->instanceClazz($paramClazz);
                    $this->instanceClazz[$name] = $args[$param->getName() ];

                }else{
                    $args[$param->getName() ] = $this->instanceClazz($paramClazz);
                    $this->instanceClazz[$name] = $args[$param->getName() ];
                }
            }
            return $instance =  $reflect->newInstanceArgs($args);
        }
    }

    /**
     * @param array $DI
     */
    public function setDI(array $DI): void
    {
        $this->DI = $DI;
    }

    public function add(array $depend){
       $this->instance = array_merge($depend,$this->instance);
    }
}