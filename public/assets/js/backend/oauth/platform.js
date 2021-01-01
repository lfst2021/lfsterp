define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'oauth/platform/index' + location.search,
                    add_url: 'oauth/platform/add',
                    edit_url: 'oauth/platform/edit',
                    //del_url: 'oauth/platform/del',
                    //multi_url: 'oauth/platform/multi',
                    //import_url: 'oauth/platform/import',
                    table: 'platform',
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false, //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'platform_id',
                sortName: 'updated_at',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'platform_id', title: __('Platform_id')},
                        {field: 'platform_code', title: __('Platform_code'), operate: 'LIKE'},
                        {field: 'platform_name', title: __('Platform_name'), operate: 'LIKE'},
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