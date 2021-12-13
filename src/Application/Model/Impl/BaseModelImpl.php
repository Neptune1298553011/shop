<?php

namespace Application\Model\Impl;

class BaseModelImpl
{
    protected $conn;
    protected $tableName;
    public function __construct(\PDO $pdo)
    {
        $this->conn =  $pdo ;
    }
}