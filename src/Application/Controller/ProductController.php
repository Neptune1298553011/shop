<?php

namespace Application\Controller;

use Application\Model\Impl\BaseModelImpl;
use Application\Service\ProductService;

class ProductController extends BaseController
{
    private  $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function findAllProduct()
    {

        $res = $this->productService->findAllProduct();
        return  $this->json($res);
    }
}