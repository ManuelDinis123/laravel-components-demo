@extends('layouts.side', ['active' => 'breadcrumbs'])

@section('content')

    <div class="container">        
        {{-- Only Title --}}
        @component('components.breadcrumbs', [
            'container_class' => 'page-title',
            'title' => 'Breadcrumbs',
            'separator' => true,
        ])
        @endcomponent        

        @component('components.breadcrumbs', [
            'title' => 'Styled BreadCrumbs',
            'crumbs' => [
                ["label"=>"Inactive Link", "link"=>null],
                ["label"=>"Link 1", "link"=>"#"],
                ["label"=>"Selected Link", "link"=>"#", "active"=>true],
            ],
            'container_class' => 'demo-bc',
            'custom' => [                
                "title_css" => "background-color: #8f1818; color:#ebebeb; padding:25px; border-radius: 15px;",
                "container_css" => "background-color: #212121; padding:15px; border-radius:15px;",
                "links_color" => "#a8a8a8",
                "inactive_color" => "#858585",
                "active_link_color" => "white",
                "hover_color" => "white",
                "dash_color" => "#cfcfcf"
            ]
        ])
        @endcomponent

        <br>

        @component('components.breadcrumbs', [
            'container_class' => 'default-demo-bc',
            'title' => 'Default Style',
            'crumbs' => [
                ["label"=>"Inactive Link", "link"=>null],
                ["label"=>"Link 1", "link"=>"#"],
                ["label"=>"Selected Link", "link"=>"#", "active"=>true],
            ],
        ])
        @endcomponent
    </div>

@stop
