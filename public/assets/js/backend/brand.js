define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'brand/index' + location.search,
                    add_url: 'brand/add',
                    edit_url: 'brand/edit',
                    del_url: 'brand/del',
                    table: 'brand'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'brand_id',
                sortName: 'brand_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'brand_id', title: __('Brand_id'), operate: '='},
                        {field: 'brand_name', title: __('Brand_name'), operate: 'LIKE'},
                        {field: 'brand_sort', title: __('Brand_sort'), operate: false},
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