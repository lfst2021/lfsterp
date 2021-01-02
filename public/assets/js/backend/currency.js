define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'currency/index' + location.search,
                    add_url: 'currency/add',
                    edit_url: 'currency/edit',
                    del_url: 'currency/del',
                    table: 'currency'
                },
                showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                showExport: false  //导出功能
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'currency_id',
                sortName: 'currency_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'currency_id', title: __('Currency_id')},
                        {field: 'currency_code', title: __('Currency_code')},
                        {field: 'currency_name', title: __('Currency_name'), operate: false},
                        {field: 'currency_symbol', title: __('Currency_symbol'), operate:false},
                        {field: 'currency_rate', title: __('Currency_rate'), operate:false},
                        {field: 'created_at', title: __('Created_at'), operate:false},
                        {field: 'updated_at', title: __('Updated_at'), operate:false},
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