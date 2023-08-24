{{-- 
    Component to build a modal.
    Requires Bootstrap 5    
--}}

<style>
    .modal-card-content {
        display: grid;
        align-items: end;
        height: 100%;
    }

    .modal-card-general {
        width: 140px;
        height: 140px;
        transition: all 0.2s;
        cursor: pointer;
    }

    .modal-card-general:hover {
        transform: scale(1.05);
    }

    @media only screen and (max-width: 495px) {
        .modal-card-general {
            width: 26vw;
            height: 26vw;
        }

        .modal-card-general span {
            display: none;
        }
    }
</style>
@if (isset($cards))
    <style>
        .bd-{{ $modal_id }} .scrollable {
            overflow-y: auto;
            overflow-x: hidden;
            height: 600px;
            margin-left: 5px;
        }

        .bd-{{ $modal_id }} .scrollable::-webkit-scrollbar {
            width: 12px;
        }

        .bd-{{ $modal_id }} .scrollable::-webkit-scrollbar-track {
            background-color: #dbdbdb;            
            border-radius: 10px;
        }

        .bd-{{ $modal_id }} .scrollable::-webkit-scrollbar-thumb {            
            border-radius: 10px;
            background-color: {{isset($scrollerColor)?$scrollerColor:'#242424'}} ;
        }

        .bd-{{ $modal_id }} {
            position: relative;
            flex: 1 1 auto;
            padding: 0 !important;
        }
    </style>
@endif

{{-- Call this to get a custom modal --}}
<div class="modal fade" id="{{ $modal_id }}" aria-labelledby="{{ $modal_id }}Label" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Use this to send raw code to the modal --}}
            @if (isset($rawModal))
                {!! $rawModal !!}
            @endif
            {{-- Set hasHeader to true if you want the modal to have a header --}}
            @if (isset($hasHeader))
                <div class="modal-header">
                    @if (!isset($rawHeader))
                        <h5 class="modal-title">{{ $modalTitle }}</h5>
                    @else
                        {!! $rawHeader !!}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif
            {{-- Set hasBody to true to use the body --}}
            @if (isset($hasBody))
                <div class="modal-body bd-{{ $modal_id }}">
                    @if (isset($inputs))
                        {{-- Build the inputs --}}
                        @foreach ($inputs as $input)
                            @if ($input['type'] == 'select')
                                {{-- If the type is select the input is built different --}}
                                <label
                                    class="mt-1 {{ !isset($input['lbl_class']) ? '' : $input['lbl_class'] }}">{{ $input['label'] }}</label>
                                <select id="{{ $input['id'] }}"
                                    class="{{ !isset($input['class']) ? 'form-select' : $input['class'] }} mb-3 {{ $input['id'] }}">
                                    <option value="0" class="text-muted" disabled selected>
                                        {{ isset($input['default']) ? $input['default'] : 'Select Options' }}
                                    </option>
                                    @foreach ($input['options'] as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                            @else
                                <label
                                    class="{{ !isset($input['lbl_class']) ? '' : $input['lbl_class'] }}">{{ $input['label'] }}</label>
                                @if (isset($input['optional']))
                                    <br /><span class="text-muted" style="font-size: 15px">(optional)</span>
                                @endif
                                @if ($input['type'] == 'textarea')
                                    <textarea type="{{ $input['type'] }}"
                                        @if (isset($input['placeholder'])) placeholder="{{ $input['placeholder'] }}" @endif
                                        class="{{ !isset($input['class']) ? 'form-control' : $input['class'] }} mb-3" id="{{ $input['id'] }}"
                                        autocomplete="off"></textarea>
                                @else
                                    <input type="{{ $input['type'] }}"
                                        @if (isset($input['placeholder'])) placeholder="{{ $input['placeholder'] }}" @endif
                                        class="{{ !isset($input['class']) ? 'form-control' : $input['class'] }} mb-3"
                                        id="{{ $input['id'] }}" autocomplete="off"
                                        @if (isset($input['restrictFile'])) accept="image/*" @endif>
                                @endif
                            @endif
                        @endforeach
                    @endif
                    {{-- Cards with Images --}}
                    @if (isset($cards))
                        <div class="modal-menu" id="modal_menu" style="display: inline-flex">
                            <div class="scrollable">
                                <div class="row" style="padding: 5px">
                                    @foreach ($cards as $card)
                                        <div class="{{ count($cards) == 2 ? 'col-6' : 'col-4' }} modal-card-selectable"
                                            id="modal-card-selectable{{ $card['id'] }}">
                                            <style>
                                                .modal-card{{ $card['id'] }} {
                                                    margin: 5px 0px;

                                                    background: @if (isset($card['left_label']) || isset($card['right_label']))
                                                        linear-gradient(180deg, rgba(0, 0, 0, 0) 47.4%, #000000 100%),
                                                    @endif
                                                    url("{{ $card['image'] }}");
                                                    background-size: cover;
                                                    background-position: center;
                                                    border-radius: 15px;
                                                    padding: 10px 10px;
                                                }

                                                /*  */
                                            </style>
                                            <input type="hidden" value="{{ $card['id'] }}">
                                            <div class="modal-card{{ $card['id'] }} modal-card-general">
                                                <div class="modal-card-content">
                                                    <span class="unselectable" style="color:white; font-weight:600">
                                                        @if (isset($card['left_label']))
                                                            <span>{{ $card['left_label'] }}</span>
                                                        @endif
                                                        @if (isset($card['right_label']))
                                                            <span
                                                                style="float: right">{{ $card['right_label'] }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- for custom body --}}
                    @if (isset($rawBody))
                        {!! $rawBody !!}
                    @endif
                    {{-- Show a message at the end of the modal [message => 'message', classes => 'list of classes'] --}}
                    @if (isset($messages))
                        @foreach ($messages as $message)
                            <label class="{{ $message['class'] }}">{{ $message['message'] }}</label><br />
                        @endforeach
                    @endif
                </div>
            @endif
            {{-- Footer --}}
            @if (isset($hasFooter))
                <div class="modal-footer">
                    @if (isset($rawFooter))
                        {!! $rawFooter !!}
                    @endif
                    @if (isset($footerMessage))
                        <span class="text-muted">{{ $footerMessage }}</span>
                    @endif
                    {{-- Buttons on footer send array has [b1 => [label => 'button label', id => 'idOfBtn', 'class' => 'btn btn-primary', 'dismiss' => true (optional)]] --}}
                    @if (isset($buttons))
                        @foreach ($buttons as $button)
                            <button id="{{ $button['id'] }}" class="{{ $button['class'] }}"
                                @if (isset($button['function'])) onclick="{{ $button['function'] }}()" @endif
                                @if (isset($button['dismiss'])) data-bs-dismiss="modal" @endif>{{ $button['label'] }}</button>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
