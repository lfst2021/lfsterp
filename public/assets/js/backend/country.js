define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'country/index' + location.search,
                    add_url: 'country/add',
                    edit_url: 'country/edit',
                    del_url: 'country/del',
                    table: 'country'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'country_id',
                sortName: 'country_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'country_id', title: __('Country_id'), operate: '='},
                        {field: 'country_code', title: __('Country_code'), operate: 'LIKE'},
                        {field: 'country_name', title: __('Country_name'), operate: 'LIKE'},
                        {field: 'country_name_en', title: __('Country_name_en'), operate: 'LIKE'},
                        {field: 'country_sort', title: __('Country_sort'), operate: false},
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