<?php
/**
 * Created by PhpStorm.
 * User: daniel-wu
 * Date: 2020/12/28
 * Time: 11:26
 */

namespace app\admin\controller;

use app\common\controller\Backend;

class OrderStatus extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'status_id,status_name';

    /**
     * OrderStatus模型对象
     * @var \app\admin\model\OrderStatus
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\OrderStatus;
    }
}