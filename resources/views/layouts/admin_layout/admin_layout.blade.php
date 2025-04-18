<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jhabis Food Mart</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Amras Grocery Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Jost font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="{{ url('admin/css/admin_css/lib/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/admin_css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/admin_css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/admin_css/image-drop.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/admin_css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        body, p {
            font-family: 'Jost', sans-serif;
        }

        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .table thead {
            background-color: #f1f3f5;
        }

        .badge-success {
            font-size: 0.9rem;
            padding: 0.5em 0.7em;
        }

        textarea.form-control {
            border-radius: 6px;
            resize: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.375rem 1.25rem;
            font-size: 0.875rem;
            border-radius: 6px;
        }

        @media (max-width: 576px) {
            .card-header h5 {
                font-size: 1.1rem;
            }

            .text-end {
                text-align: left !important;
            }
        }
    </style>
</head>

<body>
    <div>
        <!-- Left Panel -->
        @include('layouts.admin_layout.admin_sidebar')
        <!-- /#left-panel -->

        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            @include('layouts.admin_layout.admin_header')
            <!-- /Header -->
            <!-- Content -->
            @yield('content')
            <!-- /.content -->
            <div class="clearfix"></div>

            @include('layouts.admin_layout.admin_footer')
        </div>
        <!-- /#right-panel -->
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/fontawesome.min.js"></script>
        <script src="{{ url('js/admin_js/main.js') }}"></script>

        <script src="{{ url('js/admin_js/lib/data-table/datatables.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/jszip.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/vfs_fonts.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/buttons.html5.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/buttons.print.min.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/data-table/buttons.colVis.min.js') }}"></script>
        <script src="{{ url('js/admin_js/init/datatables-init.js') }}"></script>
        <script src="{{ url('js/admin_js/admin_script.js') }}"></script>
        <script src="{{ url('js/admin_js/lib/chosen/chosen.jquery.min.js') }}"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="{{ url('js/admin_js/init/weather-init.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="{{ url('js/admin_js/init/fullcalendar-init.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!--Local Stuff-->
        <script>
            jQuery(document).ready(function ($) {
                // $(document).ready(function() {
                "use strict";

                $(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });

                $('#bootstrap-data-table-export').DataTable();
                // Pie chart flotPie1
                var piedata = [
                    { label: "Desktop visits", data: [[1, 32]], color: '#5c6bc0' },
                    { label: "Tab visits", data: [[1, 33]], color: '#ef5350' },
                    { label: "Mobile visits", data: [[1, 35]], color: '#66bb6a' }
                ];

                $.plot('#flotPie1', piedata, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            innerRadius: 0.65,
                            label: {
                                show: true,
                                radius: 2 / 3,
                                threshold: 1
                            },
                            stroke: {
                                width: 0
                            }
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
                // Pie chart flotPie1  End
                // cellPaiChart
                var cellPaiChart = [
                    { label: "Direct Sell", data: [[1, 65]], color: '#5b83de' },
                    { label: "Channel Sell", data: [[1, 35]], color: '#00bfa5' }
                ];
                $.plot('#cellPaiChart', cellPaiChart, {
                    series: {
                        pie: {
                            show: true,
                            stroke: {
                                width: 0
                            }
                        }
                    },
                    legend: {
                        show: false
                    }, grid: {
                        hoverable: true,
                        clickable: true
                    }

                });
                // cellPaiChart End
                // Line Chart  #flotLine5
                var newCust = [[0, 3], [1, 5], [2, 4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

                var plot = $.plot($('#flotLine5'), [{
                    data: newCust,
                    label: 'New Data Flow',
                    color: '#fff'
                }],
                    {
                        series: {
                            lines: {
                                show: true,
                                lineColor: '#fff',
                                lineWidth: 2
                            },
                            points: {
                                show: true,
                                fill: true,
                                fillColor: "#ffffff",
                                symbol: "circle",
                                radius: 3
                            },
                            shadowSize: 0
                        },
                        points: {
                            show: true,
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false
                        }
                    });
                // Line Chart  #flotLine5 End
                // Traffic Chart using chartist
                if ($('#traffic-chart').length) {
                    var chart = new Chartist.Line('#traffic-chart', {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        series: [
                            [0, 18000, 35000, 25000, 22000, 0],
                            [0, 33000, 15000, 20000, 15000, 300],
                            [0, 15000, 28000, 15000, 30000, 5000]
                        ]
                    }, {
                        low: 0,
                        showArea: true,
                        showLine: false,
                        showPoint: false,
                        fullWidth: true,
                        axisX: {
                            showGrid: true
                        }
                    });

                    chart.on('draw', function (data) {
                        if (data.type === 'line' || data.type === 'area') {
                            data.element.animate({
                                d: {
                                    begin: 2000 * data.index,
                                    dur: 2000,
                                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                    to: data.path.clone().stringify(),
                                    easing: Chartist.Svg.Easing.easeOutQuint
                                }
                            });
                        }
                    });
                }
                // Traffic Chart using chartist End
                //Traffic chart chart-js
                if ($('#TrafficChart').length) {
                    var ctx = document.getElementById("TrafficChart");
                    ctx.height = 150;
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [
                                {
                                    label: "Visit",
                                    borderColor: "rgba(4, 73, 203,.09)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(4, 73, 203,.5)",
                                    data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                                },
                                {
                                    label: "Bounce",
                                    borderColor: "rgba(245, 23, 66, 0.9)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(245, 23, 66,.5)",
                                    pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                    data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                                },
                                {
                                    label: "Targeted",
                                    borderColor: "rgba(40, 169, 46, 0.9)",
                                    borderWidth: "1",
                                    backgroundColor: "rgba(40, 169, 46, .5)",
                                    pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                    data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                intersect: false
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            }

                        }
                    });
                }
                //Traffic chart chart-js  End
                // Bar Chart #flotBarChart
                $.plot("#flotBarChart", [{
                    data: [[0, 18], [2, 8], [4, 5], [6, 13], [8, 5], [10, 7], [12, 4], [14, 6], [16, 15], [18, 9], [20, 17], [22, 7], [24, 4], [26, 9], [28, 11]],
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fillColor: '#ffffff8a'
                    }
                }], {
                    grid: {
                        show: false
                    }
                });
                // Bar Chart #flotBarChart End
            });
        </script>
</body>

</html>