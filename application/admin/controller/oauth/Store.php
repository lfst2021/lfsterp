<?php

namespace app\admin\controller\oauth;

use Exception;
use think\Db;
use think\exception\PDOException;
use think\exception\ValidateException;
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
     * @throws Exception
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
     * @throws Exception
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);

                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : $name) : $this->modelValidate;
                        $this->model->validateFailException(true)->validate($validate);
                    }
                    $result = $this->model->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were inserted'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign('platforms', Platform::getPlatformName(null, true));
        $this->view->assign('statuses', $this->model->getStatusName());
        $this->view->assign('defaultStoreStatus', \app\admin\model\Store::STATUS_ENABLE);
        $this->view->assign('admins', Admin::getAdminName(null, true));
        $this->view->assign('warehouses', Warehouse::getWarehouseName(null, true));
        return $this->view->fetch();
    }

    /**
     * edit方法
     * @param mixed $ids
     * @return string
     * @throws Exception
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                        $row->validateFailException(true)->validate($validate);
                    }
                    $result = $row->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were updated'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        $this->view->assign('platforms', Platform::getPlatformName(null, true));
        $this->view->assign('statuses', $this->model->getStatusName());
        $this->view->assign('admins', Admin::getAdminName(null, true));
        $this->view->assign('warehouses', Warehouse::getWarehouseName(null, true));
        return $this->view->fetch();
    }
}
