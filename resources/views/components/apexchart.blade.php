{{-- 
    ApexChart Component
    TODO: Write comment
--}}
    
<div class="alert alert-warning" role="alert">
  WARNING: APEX CHART COMPONENT IS UNFINISHED
</div>

{{-- TODO: Unfinished --}}
{{-- TODO: If data sent will give out an error, don't even load the stuff --}}
{{-- ! Error Checks ! --}}
@php
    // Fields that MUST be sent, or else it won't work    
    $missing = [];
    if(!isset($chart_id)) {
        $missing[] = '$chart_id';
    }
    
    // TODO: Also check types!
    // For example, colors is supposed to be an array, so, check if it's an array, if not, throw an error
    // "Colors is expected to be an Array but xxx given"
    $requiredOptions = [
        "type",
        "colors",
        "stroke"
    ];
    foreach ($requiredOptions as $required) {
        if(!isset($options[$required])) $missing[] = 'Option: ' . $required;
    }

    // Fields that must match
    if(count($series) != count($options['stroke'])) {
        // This doesn't really prevent the chart from rendering... Maybe just throw a console error ?
        // TODO: show message
    }
@endphp

@if(count($missing))
    @component('components.error', [
        'message' => 'ApexChart Component is missing required fields',
        'missing' => $missing
    ]) @endcomponent
    @php return @endphp
@endif



<div id="{{ $chart_id }}">
</div>

@if (!isset($custom_options))
    <script>
        var options = {
            chart: {
                height: "{{ $options['height'] ?? 350 }}",
                type: "{{ $options['type'] }}",
                stacked: "{{ $options['stacked'] ?? false }}"
            },
            dataLabels: {
                enabled: false
            },
            colors: {!! json_encode($options['colors']) !!},
            series: {!! json_encode($series) !!},
            stroke: {
                width: {!! json_encode($options['stroke']) !!}
            },
            plotOptions: {
                bar: {
                    columnWidth: "20%"
                }
            },
            xaxis: {
                categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
            },
            yaxis: [{
                    axisTicks: {
                        show: true
                    },
                    axisBorder: {
                        show: true,
                        color: "#FF1654"
                    },
                    labels: {
                        style: {
                            colors: "#FF1654"
                        }
                    },
                    title: {
                        text: "Series A",
                        style: {
                            color: "#FF1654"
                        }
                    }
                },
                {
                    opposite: true,
                    axisTicks: {
                        show: true
                    },
                    axisBorder: {
                        show: true,
                        color: "#247BA0"
                    },
                    labels: {
                        style: {
                            colors: "#247BA0"
                        }
                    },
                    title: {
                        text: "Series B",
                        style: {
                            color: "#247BA0"
                        }
                    }
                }
            ],
            tooltip: {
                shared: false,
                intersect: true,
                x: {
                    show: false
                }
            },
            legend: {
                horizontalAlign: "left",
                offsetX: 40
            }
        };

        var chart = new ApexCharts(document.querySelector("#{{ $chart_id }}"), options);

        chart.render();
    </script>
@else
    <script>
        // Custom options (NOT RECOMMENDED)
        var chart = new ApexCharts(document.querySelector("#{{ $chart_id }}"), {!! json_encode($custom_options) !!});

        chart.render();
    </script>
@endif
