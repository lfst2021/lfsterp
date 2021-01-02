define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'shipping_category/index' + location.search,
                    add_url: 'shipping_category/add',
                    edit_url: 'shipping_category/edit',
                    del_url: 'shipping_category/del',
                    table: 'shipping_category'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'shipping_cate_id',
                sortName: 'shipping_cate_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'shipping_cate_id', title: __('Shipping_cate_id')},
                        {field: 'category_name_zh', title: __('Category_name_zh'), operate: 'LIKE'},
                        {field: 'category_name', title: __('Category_name'), operate: 'LIKE'},
                        {field: 'material', title: __('Material'), operate: false},
                        {field: 'weight', title: __('Weight'), operate: false},
                        {field: 'declare_price', title: __('Declare_price'), operate: false},
                        {field: 'sort', title: __('Sort'), operate: false},
                        {field: 'created_at', title: __('Created_at'), operate: false},
                        {field: 'updated_at', title: __('Updated_at'), operate: false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});