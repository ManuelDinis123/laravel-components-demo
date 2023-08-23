@extends('layouts.side', ['active' => 'tables'])

@section('content')
    <style>
        .dt-actions {
            color: #8f1818 !important;
        }

        .pg-btn {
            cursor: pointer;
            transform: scale(1.05) !important;
        }
    </style>

    <div class="container">        
        @component('components.breadcrumbs', [
            'container_class' => "title-bc",
            'title' => "Table Component Example",
            'separator' => true,
            'custom' => [                
                "title_css" => "background-color: #8f1818; color:white; padding:18px; border-radius: 10px;",
            ]
        ])
        @endcomponent

        {{-- Usage of Table Builder --}}
        @component('components.table_builder', [
            'tableID' => 'items',
            'cols' => [['label' => '#'], ['label' => 'Name'], ['label' => 'Age'], ['label' => '']],
            'ordering' => false,
            'responsive' => true,
            'custom_style' => [
                'header_color' => '#8f1818',
                'header_text_color' => 'white',
                'background_color' => '#ededed',
            ],
            'paginate' => [
                'next' => "<i class='bx bxs-right-arrow pg-btn' ></i>",
                'previous' => "<i class='bx bxs-left-arrow pg-btn' ></i>",
                'color' => '#8f1818',
            ],
            'method' => 'post',
            'url' => '/tables/get',
            'ajax_cols' => [
                ['data' => 'id', 'width' => '15%'],
                ['data' => 'name', 'width' => '35%'],
                ['data' => 'age', 'width' => '25%'],
            ],
            'actions' => [
                'width' => '25%',
                'actions' => '<i class="bx bxs-pencil dt-actions" onclick="actions_example({ROWID})"></i>
                        <i class="bx bxs-trash dt-actions" onclick="actions_example({ROWID})"></i>',
                'replace' => [
                    '{ROWID}' => 'id',
                ],
            ],
        ])
        @endcomponent
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // You would have an actions here, for demo purposes only shows a pop up
        function actions_example(rowID) {
            Swal.fire({
                title: 'Action!',
                text: 'Now there would be an action happening to the\n item with the id ' + rowID,
                icon: 'info',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1f1f1f'
            })
        }
    </script>
@stop
