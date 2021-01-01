define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'oauth/store/index' + location.search,
                    add_url: 'oauth/store/add',
                    edit_url: 'oauth/store/edit',
                    multi_url: 'oauth/store/multi',
                    table: 'store',
                },
                searchFormVisible: false
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'store_id',
                sortName: 'store_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'store_id', title: __('Store_id'), operate: false},
                        {field: 'store_name', title: __('Store_name'), operate: 'LIKE'},
                        {
                            field: 'platform_id',
                            title: __('Platform_id'),
                            searchList: $.getJSON('ajax/platform')
                        },
                        {
                            field: 'charge_person',
                            title: __('Charge_person'),
                            searchList: $.getJSON('ajax/admin')
                        },
                        {
                            field: 'store_status',
                            title: __('Store_status'),
                            searchList: {1: __('Enable'), 2: __('Disable')},
                            custom: {1:'success', 2:'gray'}, //自定义状态颜色
                            formatter: Table.api.formatter.status
                        },
                        {field: 'warehouse_id', title: __('Warehouse_id'), operate: false},
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