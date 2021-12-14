<?php

namespace Application\Service\Impl;

use Application\Model\ProductModel;
use Application\Service\ProductService;

class ProductServiceImpl implements ProductService
{
    private  $productModel;
    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }
//    public function findProductById($id)
//    {
//        return $this->productModel->selectFindById($id);
//    }


    public function findAllProduct()
    {
       return $this->productModel->selectProductAll();
    }
}