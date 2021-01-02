<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Supplier extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'supplier_id,supplier_name';

    /**
     * Supplier模型对象
     * @var \app\admin\model\Supplier
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Supplier;

    }
}
