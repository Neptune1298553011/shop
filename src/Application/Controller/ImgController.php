<?php
namespace  Application\Controller;
use Application\Service\ImgService;
use JsonException;


class ImgController extends BaseController
{
    private $service;
    public function __construct(ImgService $imgService)
    {
        $this->service = $imgService;
    }

    /**
     * 获取商品详情信息
     * @param
     * @throws JsonException
     */
    public function productDetail(){
        $id =$_GET['id'];
        $res =  $this->service->findImgById( $id);
        return  $this->json($res);
    }

    public function removeProduct(){
        $id =$_GET['id'];
       // todo
        return  $this->json([],"删除成功",);
    }
}
