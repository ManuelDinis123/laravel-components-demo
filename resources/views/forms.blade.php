@extends('layouts.side', ['active' => 'forms'])

@section('content')

    <style>
        .form-icon {
            font-size: 25px;
            margin: 5px 5px 10px 5px;
            color: #8f1818;
        }

        .custom-input {
            border-radius: 20px;
            box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.25) !important;
            font-weight: 400;
        }

        .form-lbls {
            font-size: 20px;
            font-weight: 600;
            color: rgb(240, 240, 240);
        }

        .form-btn-1 {
            background-color: #8f1818;
            color: white;
            font-weight: 700;
            transition: all 0.2s;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.25) !important;
        }

        .form-btn-1:hover {
            background-color: #791c1c;
            color: white !important;
            padding: 14px;
        }

        .form-btn-1:focus {
            background-color: #791c1c !important;
            color: white !important;
            border: none !important;
            padding: 10px;
        }

        .form-btn-2 {
            background-color: #e28d8d;
            color: white;
            font-weight: 700;
            transition: all 0.2s;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.25) !important;
        }

        .form-btn-2:hover {
            background-color: rgb(212, 144, 144);
            color: white !important;
            padding: 14px;
        }

        .form-btn-2:focus {
            background-color: rgb(212, 144, 144) !important;
            color: white !important;
            border: none !important;
            padding: 10px;
        }
    </style>

    <div class="container pb-5">
        @component('components.breadcrumbs', [
            'container_class' => "title-bc",
            'title' => "Form Examples",
            'separator' => true,
            'custom' => [                
                "title_css" => "background-color: #8f1818; color:white; padding:18px; border-radius: 10px;",
            ]
        ])
        @endcomponent

        @component('components.form_builder', [
            'formID' => 'simpleForm',
            'formTitle' => 'Default Form',
            'inputs' => [
                ['label' => 'Name:', 'type' => 'text', 'id' => 'title', 'placeholder' => 'Your Name'],
                ['label' => 'Date of Birth:', 'type' => 'date', 'id' => 'date', 'optional' => true],
                [
                    'label' => 'Job Position:',
                    'type' => 'select',
                    'id' => 'job',
                    'options' => [['value' => 'op1', 'label' => 'Option 1'], ['value' => 'op2', 'label' => 'Option 2']],
                ],
                [
                    'label' => 'Description:',
                    'type' => 'textarea',
                    'id' => 'description',
                    'optional' => true,
                    'placeholder' => 'Short Description',
                ],
            ],
            'buttons' => [
                'btns' => [
                    ["lbl" => "Save", "class"=>"btn btn-primary"],
                    ["lbl" => "Reset", "class"=>"btn btn-dark"],
                ] 
            ]
        ])
        @endcomponent
        <hr>
        @component('components.form_builder', [
            'formID' => 'customForm',
            'rawFormTitle' => '<div class="d-flex flex-row align-items-center"><i class="bx bxs-palette form-icon"></i><h2 style="color: white; font-weight:800;">Custom Form</h2><i class="bx bxs-palette form-icon"></i></div>',
            'containerCSS' => 'padding:25px; border-radius:25px; background-color:#212121;',
            'inputs' => [
                ['label' => 'Name:', 'type' => 'text', 'id' => 'title', 'placeholder' => 'Your Name', 'class' => 'form-control custom-input', 'lbl_class'=>'form-lbls'],
                ['label' => 'Date of Birth:', 'type' => 'date', 'id' => 'date', 'optional' => "#dedede", 'class' => 'form-control custom-input', 'lbl_class'=>'form-lbls'],
                [
                    'label' => 'Job Position:',
                    'lbl_class'=>'form-lbls',
                    'class' => 'form-select custom-input',
                    'type' => 'select',
                    'id' => 'job',
                    'options' => [['value' => 'op1', 'label' => 'Option 1'], ['value' => 'op2', 'label' => 'Option 2']],
                ],
                [
                    'label' => 'Description:',
                    'lbl_class'=>'form-lbls',
                    'type' => 'textarea',
                    'class' => 'form-control custom-input',
                    'id' => 'description',
                    'optional' => "#dedede",
                    'placeholder' => 'Short Description',
                ],
            ],
            'buttons' => [
                'btns' => [
                    ["lbl" => "Save", "class"=>"btn form-btn-1 form-control mb-3"],
                    ["lbl" => "Reset", "class"=>"btn form-btn-2 form-control"],
                ] 
            ]
        ])
        @endcomponent    
    </div>

    @stop
