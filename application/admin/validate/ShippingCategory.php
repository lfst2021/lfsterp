<?php

namespace app\admin\validate;

use think\Validate;

class ShippingCategory extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'category_name'  => 'require|unique:shipping_category',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'category_name.require' => '{%Category name require}',
        'category_name.unique'  => '{%Category name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
