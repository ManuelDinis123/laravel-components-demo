@extends('layouts.side', ['active' => 'dashboard'])

@section('content')

    <link rel="stylesheet" href="{{ mix('resources/css/home.css') }}">

    <style>
        .modal1 {
            position: relative;
            top: 81px;
            left: 76px;
            filter: drop-shadow(-6px 6px 0px rgba(0, 0, 0, 0.3));
            width: 250.911px;
            height: 271.761px;
            transform: rotate(350deg);
            flex-shrink: 0;
            transition: all 0.5s ease;
            background: url({{ mix('public/imgs/modal1.png') }});
            background-size: 248px;
        }

        .modal2 {
            position: relative;
            top: -174px;
            left: 215px;
            filter: drop-shadow(-5px 5px 0px rgba(0, 0, 0, 0.3));
            width: 245.564px;
            height: 274.761px;
            transform: rotate(8.748deg);
            transition: all 0.5s ease;
            background: url({{ mix('public/imgs/modal2.png') }});
            background-size: 244px;
        }

        .table-showcase {
            position: relative;
            top: 152px;
            left: 34px;
            width: 450px;
            height: 103px;
            transform: rotate(-5.185deg);
            filter: drop-shadow(-6px 6px 0px rgba(0, 0, 0, 0.3));
            transition: all 0.5s ease;
            background: url({{ mix('public/imgs/table.png') }});
            background-size: 456px;
        }

        /*  */
    </style>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="showcase-container" id="modals_demo">
                <div class="modal1"></div>
                <div class="modal2"></div>
                <div class="modal-shadow"></div>
            </div>
            <div class="showcase-container" id="tables_demo">
                <div class="table-showcase"></div>
                <div class="table-shadow"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="showcase-container" id="forms_demo">
                <input type="text" class="form-control custom-input input3" placeholder="Builder">
                <input type="text" class="form-control custom-input input2" placeholder="Form">
                <input type="text" class="form-control custom-input input1" placeholder="Custom">
                <div class="form-shadow"></div>
            </div>
            <div class="showcase-container" id="breadcrumbs">
                {{-- For this one have the breadcrumbs title saying breadcrumbs
                    and on hover the links slide from the title to the left
                    each with some delay --}}
            </div>
        </div>
    </div>

    <script>
        $("#modals_demo").on('click', () => {
            window.location.href = "/modals";
        })
        $("#tables_demo").on('click', () => {
            window.location.href = "/tables";
        })
        $("#forms_demo").on('click', () => {
            window.location.href = "/forms";
        })
    </script>
@stop
