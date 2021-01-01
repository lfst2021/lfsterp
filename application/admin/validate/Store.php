<?php

namespace app\admin\validate;

use think\Validate;

class Store extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'store_name'  => 'require|unique:store',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'store_name.require'   => '{%Store name require}',
        'store_name.unique'    => '{%Store name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
    
}
