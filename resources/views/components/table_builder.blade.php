{{-- 
    This is the table builder component, it creates a table using the datatables plugin
    To use it you must have the datatables plugin in your project included either in a global file or in the file where this
    component is used, it must always be included before using this component
--}}

@if (isset($custom_style))
    <style>
        :root {
            --header-color: {{ $custom_style['header_color'] }};
            --header-text-color: {{ $custom_style['header_text_color'] }};
            --table-bg-color:{{ $custom_style['background_color'] }};
            --paginate-color:{{$paginate['color']}};
        }
        .table {
            --bs-table-bg: {{ $custom_style['background_color'] }};
        }

        table.dataTable {
            clear: both;
            margin-top: 6px !important;
            margin-bottom: 6px !important;
            max-width: none !important;
            border-collapse: collapse !important;
        }

        .dt-actions {
            cursor: pointer;            
            transition: all 0.2s;
        }

        .dt-actions:hover {
            transform: scale(1.2);
        }

        .dataTables_filter {
            display: none;
        }

        table.dataTable thead tr .h-end {
            border-radius: 0px 15px 0px 0px;
        }

        table.dataTable thead tr .h-start {
            border-radius: 15px 0px 0px 0px;
        }

        .table-container {
            background-color: var(--table-bg-color);
            padding-bottom: 25px;
            border-radius: 15px;
        }

        .dataTables_paginate {
            margin-bottom: 20px;
        }

        .table {
            margin-bottom: 30px !important;
            /* background-color: white !important;     */
        }

        .dataTables_length {
            display: none;
        }

        .dataTables_info {
            display: none;
        }


        table.dataTable thead th {
            border-bottom: none;
            background-color: var(--header-color) !important;
            color: var(--header-text-color) !important;
        }

        .paginate_button{
            color:var(--paginate-color);
            vertical-align: middle;
            margin: 5px;
            margin-top: 15px;            
        }

        .current {
            font-weight: 800;
        }
    </style>
@endif

<div class="table-container {{ isset($customContainerClass) ? $customContainerClass : '' }}">
    <table id="{{ $tableID }}" class="{{ isset($tableClass) ? $tableClass : 'table w-100' }}">
        <thead>
            @php
                isset($cols[0]['class']) ? ($cols[0]['class'] .= ' h-start') : ($cols[0]['class'] = ' h-start');
                isset($cols[count($cols) - 1]['class']) ? ($cols[count($cols) - 1]['class'] .= ' h-end') : ($cols[count($cols) - 1]['class'] = ' h-end');
            @endphp
            @foreach ($cols as $col)
                <th {{ isset($col['class']) ? 'class=' . $col['class'] : '' }}>{{ $col['label'] }}</th>
            @endforeach
        </thead>
        <tbody></tbody>
    </table>
</div>

@if (isset($ordering))
    <input type="hidden" id="ordering" value="{{ $ordering }}">
@endif
@if (isset($paginate))
    <input type="hidden" id="paginate" value="{{ json_encode($paginate) }}">
@endif

<input type="hidden" id="method" value="{{ $method }}">
<input type="hidden" id="ajax_url" value="{{ $url }}">
<input type="hidden" id="ajax_cols" value="{{ json_encode($ajax_cols) }}">
@if (isset($data))
    <input type="hidden" id="ajax_data" value="{{ json_encode($data) }}">
@endif
@if (isset($actions))
    <input type="hidden" id="actions" value="{{ json_encode($actions) }}">
@endif
@if (isset($responsive) ? $responsive == true : false)
    <input type="hidden" id="responsive" value="{{ $responsive }}">
@endif

<script>
    var table_obj = {};
    if ($("#ordering").val() != undefined) {
        table_obj["ordering"] = $("#ordering").val()
    }
    if ($("#responsive").val() != undefined) {
        table_obj["responsive"] = $("#responsive").val()
    }
    if ($("#paginate").val() != undefined) {
        const paginate_values = JSON.parse($("#paginate").val());
        table_obj["language"] = {
            "paginate": paginate_values
        };
    }

    var ajax_obj = {
        ajax: {
            method: $("#method").val(),
            url: $("#ajax_url").val(),
            data: {
                "_token": "{{ csrf_token() }}",
            },
            dataSrc: ''
        }
    }

    if ($("#ajax_data").val() != undefined) {
        ajax_obj['ajax']['data'] = Object.assign(ajax_obj['ajax']['data'], JSON.parse($("#ajax_data").val()));
    }

    ajax_obj['columns'] = JSON.parse($("#ajax_cols").val());

    if ($("#actions").val() != undefined) {
        const actions = JSON.parse($("#actions").val());
        var actions_obj = {
            "data": null,
            "width": actions['width'],
            "class": actions['class'] != undefined ? actions['class'] : '',
            "render": function(data, type, row, meta) {
                var acts = actions['actions'];
                $.each(actions['replace'], (key, data) => {
                    acts = acts.split(key).join(row[data]);
                })
                return acts;
            }
        }
        ajax_obj['columns'][ajax_obj['columns'].length] = actions_obj
    }

    let oTable = $("#{{ $tableID }}").DataTable(Object.assign(table_obj, ajax_obj))
</script>
