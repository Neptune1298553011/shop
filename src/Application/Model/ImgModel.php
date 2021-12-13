<?php

namespace Application\Model;

interface ImgModel
{

    public function selectFindById($id);

    /**
     *
     * @return mixed
     */
    public function selectImgAll();
}