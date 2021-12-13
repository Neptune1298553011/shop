<?php

namespace Application\Model\Impl;

use Application\Domain\Img;
use Application\Model\ImgModel;

abstract class ImgModelImpl extends BaseModelImpl implements ImgModel
{


    public function __construct(\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->tableName = 'img';
    }

    public function selectFindById($id)
    {
       // 数据操作部分
        $img = new Img();
        $img->category_name = 'ss';
        $img->parent_id = 1;
        return $img;

    }
}