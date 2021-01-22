<?php
/**
 * Created by PhpStorm.
 * User: daniel-wu
 * Date: 2020/12/28
 * Time: 11:26
 */

namespace app\admin\controller;

use app\common\controller\Backend;

class OrderStatus extends Backend
{
    /**
     * 快速搜索时执行查找的字段
     */
    protected $searchFields = 'status_id,status_name';

    /**
     * OrderStatus模型对象
     * @var \app\admin\model\OrderStatus
     */
    protected $model = null;

    /**
     * @var bool 开启验证规则
     */
    protected $modelValidate = true;

    public function index()
    {
        return $this->view->fetch();
    }

    public function index1()
    {
        $this->model = model('OrderStatus');
        return parent::index();
    }

    public function index2()
    {
        $this->model = model('OrderFlowStatus');
        return parent::index();
    }

    public function add()
    {
        if ($this->request->isPost()) {
            $this->getCurrentModel();
        }
        return parent::add();
    }

    public function edit($ids = null)
    {
        $this->getCurrentModel();
        return parent::edit($ids);
    }

    public function del($ids = "")
    {
        $this->getCurrentModel();
        parent::del($ids);
    }

    protected function getCurrentModel()
    {
        $source = $this->request->get('source');
        if ($source == 'order_status') { //订单状态
            $this->model = new \app\admin\model\OrderStatus();
        } else { //订单流转状态
            $this->model = new \app\admin\model\OrderFlowStatus();
        }
    }
}