{{-- 
    Version 1
    This is a breadcrumb component. You can send the title of the page and the breadcrumbs.
    To use custom styling you must send the container_class property so that no styles are overwritten if using this more
    than once in one page.

    Requires Bootstrap 5
--}}

<title>{{ $title }}</title>
<div class="breadcrumbs pb-4" role="navigation" aria-label="Breadcrumb">
    <div class="d-flex flex-row bread-container {{ $container_class}}">
        <div class="d-flex justify-content-start align-items-center">
            <h2 class="breadcrumbs-title" id="breadcrumb_title">{{ $title }}</h2>            
            @if (isset($crumbs))
                <div class="d-flex flex-row ms-4">
                    @foreach ($crumbs as $key => $crumb)
                        <a id="breadcrumb_redirect" {{ $crumb['link'] ? 'href=' . $crumb['link'] . '' : '' }}
                            class="{{ $crumb['link'] != null ? 'crumbs' : 'inactive-crumb' }} 
                            {{ isset($crumb['active']) ? ($crumb['active'] == true ? 'crumb-active' : '') : '' }}
                            me-2 text-muted">{{ $crumb['label'] }}</a>
                        @if (count($crumbs) != $key + 1)
                            <span class="text-muted me-2" 
                            style="color:{{isset($custom['dash_color'])?$custom['dash_color']:"black"}} !important">-</span>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @if (isset($separator) && $separator)
        <hr>
    @endif
</div>

<style>
    .{{ $container_class }} div .breadcrumbs-title {        
        font-weight: 700;
    }

    .{{ $container_class }} .crumbs {
        transition: all 0.2s;
        @if (isset($custom['links_color']))            
            color: {{ $custom['links_color'] }} !important;
        @endif
    }

    .{{ $container_class }} .inactive-crumb{
        @if (isset($custom['inactive_color']))            
            color: {{ $custom['inactive_color'] }} !important;
        @endif
    }

    .{{ $container_class }} .crumbs:hover {
        @if (isset($custom['hover_color']))            
            color: {{ $custom['hover_color'] }} !important;
        @else
            color: black !important;
        @endif
        text-decoration: underline;
    }

    .{{ $container_class }} {
        width: fit-content;
    }

    .{{ $container_class }} .crumb-active {        
        text-decoration: underline;
        @if (isset($custom['active_link_color']))            
            color: {{ $custom['active_link_color'] }} !important;
        @else
            color:black !important;
        @endif
    }
</style>



{{-- Title Styling --}}
<style>
    @if (isset($container_class))
        @if (isset($custom['title_css']))
            .{{ $container_class }} div h2 {
                {{ $custom['title_css'] }};
            }
        @endif
        @if (isset($custom['container_css']))
            .{{ $container_class }} {
                {{ $custom['container_css'] }};
            }
        @endif
    @endif
</style>
