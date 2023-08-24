{{-- 
    Form Builder Component.
    Requires Bootstrap 5
--}}

@if (isset($containerCSS))
    <style>
        .{{ $formID }} {
            {{ $containerCSS }}
        }
    </style>
@endif

<div id="{{ $formID }}" class="form-builder-container {{ $formID }}">
    @if (isset($formTitle))
        <h2>{{$formTitle}}</h2>
    @elseif (isset($rawFormTitle))
        {!!$rawFormTitle!!}
    @endif
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
            <label class="{{ !isset($input['lbl_class']) ? '' : $input['lbl_class'] }}">{{ $input['label'] }}</label>
            @if (isset($input['optional']))
                <br /><span class="text-muted" style="font-size: 15px; {{gettype($input['optional'])=="string"?"color:".$input['optional']."!important":''}}">(optional)</span>
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
    @if (isset($buttons))
        @foreach ($buttons['btns'] as $btn)
            <button class="@if (isset($btn['class'])) {{ $btn['class'] }} @else btn @endif">
                {{ $btn['lbl'] }}
            </button>
        @endforeach
    @endif
</div>
