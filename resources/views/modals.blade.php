@extends('layouts.side', ['active' => 'modals'])

@section('content')
    <style>
        .display-modal-btn {
            background-color: #8f1818;
            color: white;
            font-weight: 800;
            border: none !important;
            padding: 15px;
        }

        .display-modal-btn:hover {
            background-color: #a11b1b;
        }

        .display-modal-btn:focus {
            background-color: #811616 !important;
            color: white !important;
            border: none !important;
        }

        .display-modal-btn-darker {
            background-color: #501b1b;
            color: white;
            font-weight: 800;
            border: none !important;
            padding: 15px;
        }

        .display-modal-btn-darker:hover {
            background-color: #3a1616;
        }

        .display-modal-btn-darker:focus {
            background-color: #491f1f !important;
            color: white !important;
            border: none !important;
        }

        .display-modal-btn-even-darker {
            background-color: #240c0c;
            color: white;
            font-weight: 800;
            border: none !important;
            padding: 15px;
        }

        .display-modal-btn-even-darker:hover {
            background-color: #1f0a0a;
        }

        .display-modal-btn-even-darker:focus {
            background-color: #1f0a0a !important;
            color: white !important;
            border: none !important;
        }

        .header-title-modal i {
            font-size: 20px;
            margin-bottom: 8px;
            color: rgb(63, 130, 255);
        }

        .custom-input-modal {
            border-radius: 25px !important;
            box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.25) !important;
        }

        .modal-lbls {
            color: rgb(29, 29, 29);
            font-weight: 700;
        }

        .mdl-btns {
            font-weight: 700;
            border-radius: 20px !important;
            box-shadow: 0px 4px 0px 0px rgba(0, 0, 0, 0.25) !important;
            transition: all 0.2s;
        }
        .mdl-btns:hover {
            transform: scale(1.06);
        }
    </style>

    <div class="container">
        @component('components.breadcrumbs', [
            'container_class' => 'page-title',
            'title' => 'Modals',
            'separator' => true,
            'custom' => [
                'title_css' => 'background-color: #8f1818; color:white; padding:18px; border-radius: 10px;',
            ],
        ])
        @endcomponent

        {{-- Default Modal --}}
        @component('components.modal_builder', [
            'modal_id' => 'exampleModal',
            'hasHeader' => true,
            'modalTitle' => 'Example Default Modal',
            'hasBody' => true,
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
            'hasFooter' => true,
            'buttons' => [
                ['label' => 'Close', 'id' => 'closeMdl', 'class' => 'btn btn-danger', 'dismiss' => true],
                ['label' => 'Save', 'id' => 'save', 'class' => 'btn btn-primary'],
                ['label' => 'Reset', 'id' => 'reset', 'class' => 'btn btn-dark'],
            ],
        ])
        @endcomponent

        {{-- Styled Modal --}}
        @component('components.modal_builder', [
            'modal_id' => 'exampleStyleModal',
            'hasHeader' => true,
            'rawHeader' =>
                "<div class='d-flex align-items-center header-title-modal'><i class='bx bxl-css3'></i><h5 style='font-weight:800'>Example Styled Modal</h5></div>",
            'hasBody' => true,
            'inputs' => [
                [
                    'label' => 'Name:',
                    'lbl_class' => 'modal-lbls',
                    'type' => 'text',
                    'id' => 'title',
                    'placeholder' => 'Your Name',
                    'class' => 'form-control custom-input-modal',
                ],
                [
                    'label' => 'Date of Birth:',
                    'lbl_class' => 'modal-lbls',
                    'type' => 'date',
                    'id' => 'date',
                    'optional' => true,
                    'class' => 'form-control  custom-input-modal',
                ],
                [
                    'label' => 'Job Position:',
                    'lbl_class' => 'modal-lbls',
                    'type' => 'select',
                    'class' => 'form-control custom-input-modal',
                    'id' => 'job',
                    'options' => [['value' => 'op1', 'label' => 'Option 1'], ['value' => 'op2', 'label' => 'Option 2']],
                ],
                [
                    'label' => 'Description:',
                    'lbl_class' => 'modal-lbls',
                    'type' => 'textarea',
                    'id' => 'description',
                    'optional' => true,
                    'placeholder' => 'Short Description',
                    'class' => 'form-control  custom-input-modal',
                ],
            ],
            'hasFooter' => true,
            'buttons' => [
                ['label' => 'Close', 'id' => 'closeMdl', 'class' => 'btn btn-danger mdl-btns', 'dismiss' => true],
                ['label' => 'Save', 'id' => 'save', 'class' => 'btn btn-primary mdl-btns'],
                ['label' => 'Reset', 'id' => 'reset', 'class' => 'btn btn-dark mdl-btns'],
            ],
        ])
        @endcomponent

        {{-- Card Modal --}}
        @component('components.modal_builder', [
            'modal_id' => 'exampleCardModal',
            'hasHeader' => true,
            'rawHeader' =>
                "<div class='d-flex align-items-center header-title-modal'><i style='color:#8f1818' class='bx bxs-card'></i><h5 style='font-weight:800'>Example Card Modal</h5></div>",
            'hasBody' => true,
            'cards'=> [
                ["id"=>"card1", "image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnQLkVlOzPsYl0JHTAG3_ZV6MG0Iy6a7ErDHtNrzBmySa1RUxlDtHRc0l1vS5XK_Y5jEQ&usqp=CAU"],
                ["id"=>"card2", "image"=>"https://kinsta.com/pt/wp-content/uploads/sites/3/2019/05/o-que-php-1024x512.png", "left_label"=>"PHP", "right_label" => "V.8"],
                ["id"=>"card3", "image"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png"],                
                ["id"=>"card4", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1", "left_label"=>"Placeholder"],
                ["id"=>"card5", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],
                ["id"=>"card6", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card7", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card8", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card9", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card10", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card11", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card12", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card12", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card12", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
                ["id"=>"card12", "image"=>"https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1"],        
            ],
            'scrollerColor' => "#8f1818",
        ])
        @endcomponent

        {{-- Buttons to display modals --}}
        <button class="btn btn-primary form-control display-modal-btn" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Show Default Modal</button>

        <button class="btn btn-primary form-control display-modal-btn-darker mt-3" data-bs-toggle="modal"
            data-bs-target="#exampleStyleModal">Show Styled Modal</button>

        <button class="btn btn-primary form-control display-modal-btn-even-darker mt-3" data-bs-toggle="modal"
            data-bs-target="#exampleCardModal">Show Card Modal</button>
    </div>
@stop
