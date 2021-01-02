<?php

namespace app\admin\validate;

use think\Validate;

class Supplier extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'supplier_name'  => 'require|unique:supplier',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'supplier_name.require' => '{%Supplier name require}',
        'supplier_name.unique'  => '{%Supplier name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
