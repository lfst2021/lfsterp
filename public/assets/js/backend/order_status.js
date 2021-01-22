define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init();

            //绑定事件
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var panel = $($(this).attr("href"));
                if (panel.size() > 0) {
                    Controller.table[panel.attr("id")].call(this);
                    $(this).on('click', function (e) {
                        $($(this).attr("href")).find(".btn-refresh").trigger("click");
                    });
                }
                //移除绑定的事件
                $(this).unbind('shown.bs.tab');
            });

            //必须默认触发shown.bs.tab事件
            $('ul.nav-tabs li.active a[data-toggle="tab"]').trigger("shown.bs.tab");
        },
        table: {
            first: function () {
                // 表格1
                var table1 = $("#table1");
                table1.bootstrapTable({
                    url: 'order_status/index1',
                    pk: 'status_id',
                    extend: {
                        index_url: 'order_status/index' + location.search,
                        add_url: 'order_status/add?source=order_status',
                        edit_url: 'order_status/edit?source=order_status',
                        del_url: 'order_status/del?source=order_status',
                        table: 'order_status',
                    },
                    toolbar: '#toolbar1',
                    sortName: 'status_id',
                    search: false,
                    showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                    showExport: false,  //导出功能
                    showColumns: false,
                    columns: [
                        [
                            {checkbox: true},
                            {field: 'status_id', title: __('Status_id')},
                            {field: 'status_name', title: __('Status_name'), operate: 'LIKE'},
                            {field: 'status_color', title: __('Status_color'), operate: false},
                            {field: 'status_sort', title: __('Status_sort'), operate: false},
                            {field: 'created_at', title: __('Created_at'),  operate: false},
                            {field: 'updated_at', title: __('Updated_at'),  operate: false},
                            {field: 'operate', title: __('Operate'), table: table1, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                        ]
                    ]
                });

                // 为表格1绑定事件
                Table.api.bindevent(table1);
            },
            second: function () {
                // 表格2
                var table2 = $("#table2");
                table2.bootstrapTable({
                    url: 'order_status/index2',
                    pk: 'status_id',
                    extend: {
                        index_url: 'order_status/index' + location.search,
                        add_url: 'order_status/add?source=order_flow_status',
                        edit_url: 'order_status/edit?source=order_flow_status',
                        del_url: 'order_status/del?source=order_flow_status',
                        table: 'order_flow_status',
                    },
                    toolbar: '#toolbar2',
                    sortName: 'status_id',
                    search: false,
                    showToggle: false, //浏览模式可以切换卡片视图和表格视图两种模式
                    showExport: false,  //导出功能
                    showColumns: false,
                    columns: [
                        [
                            {checkbox: true},
                            {field: 'status_id', title: __('Status_id')},
                            {field: 'status_name', title: __('Status_name'), operate: 'LIKE'},
                            {field: 'status_color', title: __('Status_color'), operate: false},
                            {field: 'status_sort', title: __('Status_sort'), operate: false},
                            {field: 'created_at', title: __('Created_at'),  operate: false},
                            {field: 'updated_at', title: __('Updated_at'),  operate: false},
                            {field: 'operate', title: __('Operate'), table: table2, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                        ]
                    ]
                });

                // 为表格2绑定事件
                Table.api.bindevent(table2);
            }
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
            },
        }
    };
    return Controller;
});