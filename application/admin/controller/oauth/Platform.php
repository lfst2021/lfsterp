<?php

namespace app\admin\controller\oauth;

use app\common\controller\Backend;

/**
 * 平台管理
 *
 * @icon fa fa-circle-o
 */
class Platform extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'platform_id,platform_name';

    /**
     * Platform模型对象
     * @var \app\admin\model\Platform
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Platform;

    }
}
