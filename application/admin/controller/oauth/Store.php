<?php

namespace app\admin\controller\oauth;

use app\admin\model\Admin;
use app\admin\model\Platform;
use app\admin\model\Warehouse;
use app\common\controller\Backend;

/**
 * 店铺管理
 *
 * @icon fa fa-circle-o
 */
class Store extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'store_id,store_name';

    /**
     * Store模型对象
     * @var \app\admin\model\Store
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;


    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Store;

    }

    /**
     * index方法
     * @return string|\think\response\Json
     */
    public function index()
    {
        $this->relationSearch = true;

        $this->request->filter(['strip_tags', 'trim']);
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $list = $this->model
                //->with(['platform', 'admin'])
                ->where($where)
                ->order($sort, $order)
                ->paginate($limit);

            foreach ($list as $key => $value) {
                $value->platform_id = Platform::getPlatformName($value->platform_id);
                $value->charge_person = Admin::getAdminName($value->charge_person);
                $value->warehouse_id = Warehouse::getWarehouseName($value->warehouse_id);
            }

            $result = array("total" => $list->total(), "rows" => $list->items());

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * add 方法
     * @return string
     */
    public function add()
    {
        $this->view->assign('platforms', Platform::getPlatformName(null, true));
        $this->view->assign('admins', Admin::getAdminName(null, true));
        $this->view->assign('warehouses', Warehouse::getWarehouseName(null, true));
        return parent::add();
    }

    /**
     * edit方法
     * @param mixed $ids
     * @return string
     */
    public function edit($ids = null)
    {
        $this->view->assign('platforms', Platform::getPlatformName(null, true));
        $this->view->assign('admins', Admin::getAdminName(null, true));
        $this->view->assign('warehouses', Warehouse::getWarehouseName(null, true));
        return parent::edit($ids);
    }
}
