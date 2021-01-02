<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 发货品类管理
 *
 * @icon fa fa-circle-o
 */
class ShippingCategory extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'category_name';

    /**
     * ShippingCategory模型对象
     * @var \app\admin\model\ShippingCategory
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\ShippingCategory;

    }
}
