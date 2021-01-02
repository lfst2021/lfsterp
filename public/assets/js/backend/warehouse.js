define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'warehouse/index' + location.search,
                    add_url: 'warehouse/add',
                    edit_url: 'warehouse/edit',
                    table: 'warehouse'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'warehouse_id',
                sortName: 'warehouse_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'warehouse_id', title: __('Warehouse_id'), operate: '='},
                        {field: 'warehouse_code', title: __('Warehouse_code'), operate: 'LIKE'},
                        {field: 'warehouse_name', title: __('Warehouse_name'), operate: 'LIKE'},
                        {
                            field: 'warehouse_status',
                            title: __('Warehouse_status'),
                            searchList: {1: __('Enable'), 2: __('Disable')},
                            custom: {1:'success', 2:'gray'}, //自定义状态颜色
                            formatter: Table.api.formatter.status
                        },
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