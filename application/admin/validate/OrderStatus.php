<?php

namespace app\admin\validate;

use think\Validate;

class OrderStatus extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'status_name'  => 'require|unique:order_status',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'status_name.require' => '{%Status name require}',
        'status_name.unique'  => '{%Status name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
    
}
