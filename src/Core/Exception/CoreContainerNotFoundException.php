<?php

namespace Core\Exception;


use Psr\Container\NotFoundExceptionInterface;

class CoreContainerNotFoundException extends \RuntimeException implements NotFoundExceptionInterface
{

}