<?php
/**
 * Created by PhpStorm.
 * User: daniel-wu
 * Date: 2020/12/26
 * Time: 11:09
 */

namespace app\admin\model;

use think\Model;

class Base extends Model
{
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    // 时间字段取出后的默认时间格式
    protected $dateFormat = 'Y-m-d H:i:s';

}