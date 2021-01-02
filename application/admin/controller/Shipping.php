<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 运输方式管理
 *
 * @icon fa fa-circle-o
 */
class Shipping extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'shipping_id,shipping_code,shipping_name';

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    /**
     * Shipping模型对象
     * @var \app\admin\model\Shipping
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Shipping;

    }
}
