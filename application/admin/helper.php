<?php
/**
 * Created by PhpStorm.
 * User: daniel-wu
 * Date: 2021/1/2
 * Time: 17:06
 * Desc: 自定义帮助函数
 */

if (!function_exists('get_enable_disable_status')) {
    /**
     * 获取启禁用状态
     * @param mixed $key 键值
     * @return array|null|string
     */
    function get_enable_disable_status($key = null)
    {
        static $statuses = null;
        if ($statuses === null) {
            $statuses = [
                1 => __('Enable'),
                2 => __('Disable'),
            ];
        }
        if ($key === null) {
            return $statuses;
        } else {
            return isset($statuses[$key]) ? $statuses[$key] : '';
        }
    }
}