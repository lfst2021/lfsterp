<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 币种管理
 *
 * @icon fa fa-circle-o
 */
class Currency extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'currency_code';

    /**
     * Currency模型对象
     * @var \app\admin\model\Currency
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Currency;

    }
}
