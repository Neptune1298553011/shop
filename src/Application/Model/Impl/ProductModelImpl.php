<?php

namespace Application\Model\Impl;

use Application\Model\ProductModel;

abstract class ProductModelImpl extends BaseModelImpl implements ProductModel
{
    public function __construct(\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->tableName = "product";
    }

    public function selectProductAll()
    {
        $sql = "select * from $this->tableName" ;
        $query = $this->conn->query($sql);
        $result =  $query->fetchAll();

        return $result;
        // TODO: Implement selectProductAll() method.
    }
}