<?php

namespace app\admin\validate;

use think\Validate;

class Warehouse extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'warehouse_code'  => 'require|unique:warehouse',
        'warehouse_name'  => 'require|unique:warehouse',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'warehouse_code.require' => '{%Warehouse code require}',
        'warehouse_code.unique'  => '{%Warehouse code unique}',
        'warehouse_name.require' => '{%Warehouse name require}',
        'warehouse_name.unique'  => '{%Warehouse name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
