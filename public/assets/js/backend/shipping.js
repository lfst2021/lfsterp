define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'shipping/index' + location.search,
                    add_url: 'shipping/add',
                    edit_url: 'shipping/edit',
                    //del_url: 'shipping/del',
                    //multi_url: 'shipping/multi',
                    //import_url: 'shipping/import',
                    table: 'shipping',
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false, //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'shipping_id',
                sortName: 'shipping_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'shipping_id', title: __('Shipping_id')},
                        {field: 'shipping_code', title: __('Shipping_code'), operate: 'LIKE'},
                        {field: 'shipping_name', title: __('Shipping_name'), operate: 'LIKE'},
                        {field: 'logistics_company', title: __('Logistics_company'), operate: 'LIKE'},
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