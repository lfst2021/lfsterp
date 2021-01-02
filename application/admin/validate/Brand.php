<?php

namespace app\admin\validate;

use think\Validate;

class Brand extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'brand_name'  => 'require|unique:brand',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'brand_name.require' => '{%Brand name require}',
        'brand_name.unique'  => '{%Brand name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
