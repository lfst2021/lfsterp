<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 品牌管理
 *
 * @icon fa fa-circle-o
 */
class Brand extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'brand_id,brand_name';

    /**
     * Brand模型对象
     * @var \app\admin\model\Brand
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Brand;

    }
}
