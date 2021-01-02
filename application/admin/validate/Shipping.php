<?php

namespace app\admin\validate;

use think\Validate;

class Shipping extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'shipping_name'  => 'require|unique:shipping',
        'shipping_code'  => 'require|unique:shipping',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'shipping_name.require' => '{%Shipping name require}',
        'shipping_name.unique'  => '{%Shipping name unique}',
        'shipping_code.unique'  => '{%Shipping code unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
    
}
