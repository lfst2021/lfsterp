<?php

namespace app\admin\model;

use think\Model;


class Store extends Base
{
    // 表名
    protected $name = 'store';

    /**
     * @var integer 店铺状态：启用
     */
    const STATUS_ENABLE = 1;
    /**
     * @var integer 店铺状态：禁用
     */
    const STATUS_DISABLE = 2;

    /**
     * platform表relation方法
     * @return $this
     */
    public function platform()
    {
        return $this->belongsTo('platform', 'platform_id', 'platform_id', [], 'LEFT')
            ->field('platform_id,platform_name')
            ->bind(['platform_name' => 'platform_name']);
    }

    /**
     * admin表relation方法
     * @return $this
     */
    public function admin()
    {
        return $this->belongsTo('admin', 'charge_person', 'id', [], 'LEFT')
            ->field('id, username')
            ->bind(['admin_name' => 'username']);
    }
    

    







}
