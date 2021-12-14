<?php

namespace Application\Model\Impl;

use Application\Model\ProductModel;

 class ProductModelImpl extends BaseModelImpl implements ProductModel
{
    public function __construct(\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->tableName = "product";
    }

    public function selectProductAll()
    {
        $sql1 = "select id,product_name from $this->tableName where product_type = 'new' order by created_time limit 4 offset 1 " ;
//        $sql2 = "select id,product_name from $this->tableName where product_type = 'hot' order by created_time limit 4 offset 1 " ;
        $query = $this->conn->query($sql1);
        $result =   $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result  ;

        // TODO: Implement selectProductAll() method.
    }
}