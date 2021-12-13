<?php

namespace Application\Service\Impl;

use Application\Model\ImgModel;
use Application\Service\ImgService;

class ImgServiceImpl implements ImgService
{

    private $imgModel;

    public function __construct(ImgModel $imgModel)
    {
        $this->imgModel = $imgModel;
    }

    public function findImgById($id)
    {
        return $this->imgModel->selectFindById($id);
    }
    public function findAllProduct()
    {
        return $this->imgModel->selectImgAll();
    }
}
