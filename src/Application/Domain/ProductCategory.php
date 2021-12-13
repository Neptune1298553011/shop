<?php

namespace Application\Domain;

class ProductCategory
{
    public   $id;
    // 类别
    public   $category_name;
    // 父ID
    public   $parent_id;
    public   $category_status;
    // 创建时间
    public   $create_time;
}