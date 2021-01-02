<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 仓库管理
 *
 * @icon fa fa-circle-o
 */
class Warehouse extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'warehouse_id,warehouse_code,warehouse_name';

    /**
     * Warehouse模型对象
     * @var \app\admin\model\Warehouse
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Warehouse;

    }
}
