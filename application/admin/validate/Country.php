<?php

namespace app\admin\validate;

use think\Validate;

class Country extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'country_code'  => 'require|unique:country',
        'country_name'  => 'require|unique:country',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'country_code.require' => '{%Country code require}',
        'country_code.unique'  => '{%Country code unique}',
        'country_name.require' => '{%Country name require}',
        'country_name.unique'  => '{%Country name unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
