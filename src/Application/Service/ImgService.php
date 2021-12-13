<?php

namespace Application\Service;
interface ImgService
{
    /**
     * 通过图片Id查找
     * @param int $id
     * @return mixed
     */
    public function findImgById( $id);
}