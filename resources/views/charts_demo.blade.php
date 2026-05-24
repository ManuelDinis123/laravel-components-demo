@extends('layouts.side', ['active' => 'charts'])

@section('content')
    <link rel="stylesheet" href="{{ mix('resources/css/home.css') }}">

    <div class="container pt-5 pb-5">
        @component('components.breadcrumbs', [
            'container_class' => 'title-bc',
            'title' => 'Apex Chart Examples',
            'separator' => true,
            'custom' => [
                'title_css' => 'background-color: #8f1818; color:white; padding:18px; border-radius: 10px;',
            ],
        ])
        @endcomponent


        @component('components.apexchart', [
            'chart_id' => 'mychart',
            'series' => [
                [
                    'name' => "Series A",
                    'data' => [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
                ],
                [
                    'name' => "Series B",
                    'data' => [1, 6, 5, 5.5, 1, 0, 0.5, 6]
                ]
            ],
            'options' => [
                'type' => 'line',
                'stacked' => false,
                'colors' => ["#FF1654", "#247BA0"],
                'stroke' => [4, 4]
            ]
        ])
        @endcomponent
    </div>
@stop
