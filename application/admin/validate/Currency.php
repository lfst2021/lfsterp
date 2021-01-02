<?php

namespace app\admin\validate;

use think\Validate;

class Currency extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'currency_code'  => 'require|unique:currency',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'currency_code.require' => '{%Currency code require}',
        'currency_code.unique'  => '{%Currency code unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
}
