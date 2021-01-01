<?php

namespace app\admin\validate;

use think\Validate;

class Platform extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'platform_code'  => 'require|alpha|unique:platform',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'platform_code.require' => '{%Platform code require}',
        'platform_code.alpha'   => '{%Platform code alpha}',
        'platform_code.unique'  => '{%Platform code unique}'
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => [],
        'edit' => [],
    ];
    
}
