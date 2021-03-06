define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'supplier/index' + location.search,
                    add_url: 'supplier/add',
                    edit_url: 'supplier/edit',
                    del_url: 'supplier/del',
                    table: 'supplier'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'supplier_id',
                sortName: 'supplier_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'supplier_id', title: __('Supplier_id'), operate: '='},
                        {field: 'supplier_name', title: __('Supplier_name'), operate: 'LIKE'},
                        {
                            field: 'supplier_status',
                            title: __('Supplier_status'),
                            searchList: {1: __('Enable'), 2: __('Disable')},
                            custom: {1:'success', 2:'gray'}, //自定义状态颜色
                            formatter: Table.api.formatter.status
                        },
                        {field: 'supplier_sort', title: __('Supplier_sort'), operate: false},
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