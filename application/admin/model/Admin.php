<?php

namespace app\admin\model;

use think\Model;
use think\Session;

class Admin extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    /**
     * 重置用户密码
     * @author baiyouwen
     */
    public function resetPassword($uid, $NewPassword)
    {
        $passwd = $this->encryptPassword($NewPassword);
        $ret = $this->where(['id' => $uid])->update(['password' => $passwd]);
        return $ret;
    }

    // 密码加密
    protected function encryptPassword($password, $salt = '', $encrypt = 'md5')
    {
        return $encrypt($password . $salt);
    }

    /**
     * 获取管理员名称
     * @param int|null $adminId 管理员ID
     * @param boolean $isSelect 是否下拉菜单
     * @return array|string
     */
    public static function getAdminName($adminId = null, $isSelect = false)
    {
        static $admins = null;
        if ($admins === null) {
            $admins = self::column('id, username');
            if ($isSelect === true) {
                $admins = ['' => __('Please select')] + $admins;
            }
        }
        if ($adminId === null) {
            return $admins;
        } else {
            return isset($admins[$adminId]) ? $admins[$adminId] : '';
        }
    }

}
