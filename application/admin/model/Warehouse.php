<?php

namespace app\admin\model;

class Warehouse extends Base
{
    /**
     * 获取仓库名称
     * @param int|null $warehouseId 仓库ID
     * @param boolean $isSelect 是否下拉菜单
     * @return array|string
     */
    public static function getWarehouseName($warehouseId = null, $isSelect = false)
    {
        static $warehouses = null;
        if ($warehouses === null) {
            $warehouses = self::column('warehouse_id, warehouse_name');
            if ($isSelect === true) {
                $warehouses = ['' => __('Please select')] + $warehouses;
            }
        }
        if ($warehouseId === null) {
            return $warehouses;
        } else {
            return isset($warehouses[$warehouseId]) ? $warehouses[$warehouseId] : '';
        }
    }
}
