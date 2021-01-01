<?php

namespace app\admin\model;

use think\Model;

class Platform extends Base
{
    /**
     * 获取平台名称
     * @param int|null $platformId 平台ID
     * @param boolean $isSelect 是否下拉菜单
     * @return array|string
     */
    public static function getPlatformName($platformId = null, $isSelect = false)
    {
        static $platforms = null;
        if ($platforms === null) {
            $platforms = self::column('platform_id, platform_name');
            if ($isSelect === true) {
                $platforms = ['' => __('Please select')] + $platforms;
            }
        }
        if ($platformId === null) {
            return $platforms;
        } else {
            return isset($platforms[$platformId]) ? $platforms[$platformId] : '';
        }
    }
}
