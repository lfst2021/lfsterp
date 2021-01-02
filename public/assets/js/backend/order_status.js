define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order_status/index' + location.search,
                    add_url: 'order_status/add',
                    edit_url: 'order_status/edit',
                    table: 'order_status',
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'status_id',
                sortName: 'status_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'status_id', title: __('Status_id')},
                        {field: 'status_name', title: __('Status_name'), operate: 'LIKE'},
                        {field: 'status_color', title: __('Status_color'), operate: false},
                        {field: 'status_sort', title: __('Status_sort'), operate: false},
                        {field: 'created_at', title: __('Created_at'),  operate: false},
                        {field: 'updated_at', title: __('Updated_at'),  operate: false},
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