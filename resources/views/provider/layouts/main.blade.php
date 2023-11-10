<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Bookme" />
    
    <meta name="copyright" content="" />
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap/bootstrap.min.css') }}">
    <!-- data table -->
    
    <link rel="stylesheet" href="{{ asset('vendor/css/datatable/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/datatable/select.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/select2/select2-bootstrap-5-theme.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/css/datetime/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/tagify/tagify.css') }}" />
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap/icons/bootstrap-icons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mediaCss/media.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/components/_top_bar.scss') }}">
    <title>Appoint Me</title>
</head>

<body>


@include('provider.partials.sidebar')
@include('provider.partials.top-bar')
    
@yield('content')
    
    </main>
</div>
</div>

<script>
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
</script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const dataFromBackend = [{
            X: "01 Jan 2020",
            Y: 7
        },
        {
            X: "01 Mar 2020",
            Y: 16
        },
        {
            X: "03 Feb 2020",
            Y: 9
        },
        {
            X: "04 Feb 2020",
            Y: 12
        },
        {
            X: "05 Feb 2020",
            Y: 8
        },
        {
            X: "05 Mar 2020",
            Y: 13
        },
        {
            X: "06 Feb 2020",
            Y: 8
        },
        {
            X: "07 Feb 2020",
            Y: 9
        },
        {
            X: "07 Mar 2020",
            Y: 11
        },
        {
            X: "08 Feb 2020",
            Y: 10
        },
        {
            X: "08 Mar 2020",
            Y: 10
        },
        {
            X: "09 Feb 2020",
            Y: 11
        },
        {
            X: "11 Feb 2020",
            Y: 10
        },
        {
            X: "12 Dec 2019",
            Y: 5
        },
        {
            X: "12 Feb 2020",
            Y: 14
        },
        {
            X: "13 Dec 2019",
            Y: 5
        },
        {
            X: "13 Nov 2019",
            Y: 1
        },
        {
            X: "14 Dec 2019",
            Y: 4
        },
        {
            X: "14 Jan 2020",
            Y: 5
        },
        {
            X: "15 Dec 2019",
            Y: 5
        },
        {
            X: "15 Feb 2020",
            Y: 15
        },
        {
            X: "16 Feb 2020",
            Y: 9
        },
        {
            X: "16 Jan 2020",
            Y: 9
        },
        {
            X: "16 Nov 2019",
            Y: 2
        },
        {
            X: "17 Feb 2020",
            Y: 12
        },
        {
            X: "18 Feb 2020",
            Y: 16
        },
        {
            X: "19 Dec 2019",
            Y: 6
        },
        {
            X: "20 Feb 2020",
            Y: 14
        },
        {
            X: "21 Dec 2019",
            Y: 8
        },
        {
            X: "21 Feb 2020",
            Y: 7
        },
        {
            X: "21 Jan 2020",
            Y: 6
        },
        {
            X: "22 Feb 2020",
            Y: 13
        },
        {
            X: "23 Feb 2020",
            Y: 13
        },
        {
            X: "27 Dec 2019",
            Y: 5
        },
        {
            X: "27 Feb 2020",
            Y: 13
        },
        {
            X: "28 Feb 2020",
            Y: 7
        },
        {
            X: "29 Feb 2020",
            Y: 16
        },
        {
            X: "29 Jan 2020",
            Y: 8
        },
        {
            X: "31 Jan 2020",
            Y: 11
        }
    ];

    const seriesData = dataFromBackend.map((data) => {
        return {
            x: new Date(data.X),
            y: data.Y
        };
    });

    seriesData.sort((a, b) => new Date(a.x).getTime() - new Date(b.x).getTime());

    var options = {
        chart: {
            height: 380,
            type: "area"
        },
        series: [{
            data: seriesData
        }],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: "datetime",
            labels: {
                formatter: function(val, timestamp, opts) {
                    return opts.dateFormatter(new Date(timestamp), "dd MMM yyyy")
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart۱"), options);

    chart.render();


    var options = {
        chart: {
            width: 500,
            type: "donut",
            events: {
                updated: function() {
                    $(".apexcharts-legend").mCustomScrollbar();
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [44, 55, 13],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: "bottom",
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    // var chart = new ApexCharts(document.querySelector("#chart"), options);
</script>
<script>
    var options = {
        series: [{
                name: 'REVENUE',
                data: [
                    [1327359700000, 30.95],
                    [1327446000000, 31.34],
                    [1327532400000, 31.18],
                    [1327618800000, 31.05],
                    [1327878000000, 31.00],
                    [1327964400000, 30.95],
                    [1328050800000, 31.24],
                    [1328137200000, 31.29],
                    [1328223600000, 31.85],
                    [1328482800000, 31.86],
                    [1328569200000, 32.28],
                    [1328655600000, 32.10],
                    [1328742000000, 32.65],
                    [1328828400000, 32.21],
                    [1329087600000, 32.35],
                    [1329174000000, 32.44],
                    [1329260400000, 32.46],
                    [1329346800000, 32.86],
                    [1329433200000, 32.75],
                    [1329778800000, 32.54],
                    [1329865200000, 32.33],
                    [1329951600000, 32.97],
                    [1330038000000, 33.41],
                    [1330297200000, 33.27],
                    [1330383600000, 33.27],
                    [1330470000000, 32.89],
                    [1330556400000, 33.10],
                    [1330642800000, 33.73],
                    [1330902000000, 33.22],
                    [1330988400000, 31.99],
                    [1331074800000, 32.41],
                    [1331161200000, 33.05],
                    [1331247600000, 33.64],
                    [1331506800000, 33.56],
                    [1331593200000, 34.22],
                    [1331679600000, 33.77],
                    [1331766000000, 34.17],
                    [1331852400000, 33.82],
                    [1332111600000, 34.51],
                    [1332198000000, 33.16],
                    [1332284400000, 33.56],
                    [1332370800000, 33.71],
                    [1332457200000, 33.81],
                    [1332712800000, 34.40],
                    [1332799200000, 34.63],
                    [1332885600000, 34.46],
                    [1332972000000, 34.48],
                    [1333058400000, 34.31],
                    [1333317600000, 34.70],
                    [1333404000000, 34.31],
                    [1333490400000, 33.46],
                    [1333576800000, 33.59],
                    [1333922400000, 33.22],
                    [1334008800000, 32.61],
                    [1334095200000, 33.01],
                    [1334181600000, 33.55],
                    [1334268000000, 33.18],
                    [1334527200000, 32.84],
                    [1334613600000, 33.84],
                    [1334700000000, 33.39],
                    [1334786400000, 32.91],
                    [1334872800000, 33.06],
                    [1335132000000, 32.62],
                    [1335218400000, 32.40],
                    [1335304800000, 33.13],
                    [1335391200000, 33.26],
                    [1335477600000, 33.58],
                    [1335736800000, 33.55],
                    [1335823200000, 33.77],
                    [1335909600000, 33.76],
                    [1335996000000, 33.32],
                    [1336082400000, 32.61],
                    [1336341600000, 32.52],
                    [1336428000000, 32.67],
                    [1336514400000, 32.52],
                    [1336600800000, 31.92],
                    [1336687200000, 32.20],
                    [1336946400000, 32.23],
                    [1337032800000, 32.33],
                    [1337119200000, 32.36],
                    [1337205600000, 32.01],
                    [1337292000000, 31.31],
                    [1337551200000, 32.01],
                    [1337637600000, 32.01],
                    [1337724000000, 32.18],
                    [1337810400000, 31.54],
                    [1337896800000, 31.60],
                    [1338242400000, 32.05],
                    [1338328800000, 31.29],
                    [1338415200000, 31.05],
                    [1338501600000, 29.82],
                    [1338760800000, 30.31],
                    [1338847200000, 30.70],
                    [1338933600000, 31.69],
                    [1339020000000, 31.32],
                    [1339106400000, 31.65],
                    [1339365600000, 31.13],
                    [1339452000000, 31.77],
                    [1339538400000, 31.79],
                    [1339624800000, 31.67],
                    [1339711200000, 32.39],
                    [1339970400000, 32.63],
                    [1340056800000, 32.89],
                    [1340143200000, 31.99],
                    [1340229600000, 31.23],
                    [1340316000000, 31.57],
                    [1340575200000, 30.84],
                    [1340661600000, 31.07],
                    [1340748000000, 31.41],
                    [1340834400000, 31.17],
                    [1340920800000, 32.37],
                    [1341180000000, 32.19],
                    [1341266400000, 32.51],
                    [1341439200000, 32.53],
                    [1341525600000, 31.37],
                    [1341784800000, 30.43],
                    [1341871200000, 30.44],
                    [1341957600000, 30.20],
                    [1342044000000, 30.14],
                    [1342130400000, 30.65],
                    [1342389600000, 30.40],
                    [1342476000000, 30.65],
                    [1342562400000, 31.43],
                    [1342648800000, 31.89],
                    [1342735200000, 31.38],
                    [1342994400000, 30.64],
                    [1343080800000, 30.02],
                    [1343167200000, 30.33],
                    [1343253600000, 30.95],
                    [1343340000000, 31.89],
                    [1343599200000, 31.01],
                    [1343685600000, 30.88],
                    [1343772000000, 30.69],
                    [1343858400000, 30.58],
                    [1343944800000, 32.02],
                    [1344204000000, 32.14],
                    [1344290400000, 32.37],
                    [1344376800000, 32.51],
                    [1344463200000, 32.65],
                    [1344549600000, 32.64],
                    [1344808800000, 32.27],
                    [1344895200000, 32.10],
                    [1344981600000, 32.91],
                    [1345068000000, 33.65],
                    [1345154400000, 33.80],
                    [1345413600000, 33.92],
                    [1345500000000, 33.75],
                    [1345586400000, 33.84],
                    [1345672800000, 33.50],
                    [1345759200000, 32.26],
                    [1346018400000, 32.32],
                    [1346104800000, 32.06],
                    [1346191200000, 31.96],
                    [1346277600000, 31.46],
                    [1346364000000, 31.27],
                    [1346709600000, 31.43],
                    [1346796000000, 32.26],
                    [1346882400000, 32.79],
                    [1346968800000, 32.46],
                    [1347228000000, 32.13],
                    [1347314400000, 32.43],
                    [1347400800000, 32.42],
                    [1347487200000, 32.81],
                    [1347573600000, 33.34],
                    [1347832800000, 33.41],
                    [1347919200000, 32.57],
                    [1348005600000, 33.12],
                    [1348092000000, 34.53],
                    [1348178400000, 33.83],
                    [1348437600000, 33.41],
                    [1348524000000, 32.90],
                    [1348610400000, 32.53],
                    [1348696800000, 32.80],
                    [1348783200000, 32.44],
                    [1349042400000, 32.62],
                    [1349128800000, 32.57],
                    [1349215200000, 32.60],
                    [1349301600000, 32.68],
                    [1349388000000, 32.47],
                    [1349647200000, 32.23],
                    [1349733600000, 31.68],
                    [1349820000000, 31.51],
                    [1349906400000, 31.78],
                    [1349992800000, 31.94],
                    [1350252000000, 32.33],
                    [1350338400000, 33.24],
                    [1350424800000, 33.44],
                    [1350511200000, 33.48],
                    [1350597600000, 33.24],
                    [1350856800000, 33.49],
                    [1350943200000, 33.31],
                    [1351029600000, 33.36],
                    [1351116000000, 33.40],
                    [1351202400000, 34.01],
                    [1351638000000, 34.02],
                    [1351724400000, 34.36],
                    [1351810800000, 34.39],
                    [1352070000000, 34.24],
                    [1352156400000, 34.39],
                    [1352242800000, 33.47],
                    [1352329200000, 32.98],
                    [1352415600000, 32.90],
                    [1352674800000, 32.70],
                    [1352761200000, 32.54],
                    [1352847600000, 32.23],
                    [1352934000000, 32.64],
                    [1353020400000, 32.65],
                    [1353279600000, 32.92],
                    [1353366000000, 32.64],
                    [1353452400000, 32.84],
                    [1353625200000, 33.40],
                    [1353884400000, 33.30],
                    [1353970800000, 33.18],
                    [1354057200000, 33.88],
                    [1354143600000, 34.09],
                    [1354230000000, 34.61],
                    [1354489200000, 34.70],
                    [1354575600000, 35.30],
                    [1354662000000, 35.40],
                    [1354748400000, 35.14],
                    [1354834800000, 35.48],
                    [1355094000000, 35.75],
                    [1355180400000, 35.54],
                    [1355266800000, 35.96],
                    [1355353200000, 35.53],
                    [1355439600000, 37.56],
                    [1355698800000, 37.42],
                    [1355785200000, 37.49],
                    [1355871600000, 38.09],
                    [1355958000000, 37.87],
                    [1356044400000, 37.71],
                    [1356303600000, 37.53],
                    [1356476400000, 37.55],
                    [1356562800000, 37.30],
                    [1356649200000, 36.90],
                    [1356908400000, 37.68],
                    [1357081200000, 38.34],
                    [1357167600000, 37.75],
                    [1357254000000, 38.13],
                    [1357513200000, 37.94],
                    [1357599600000, 38.14],
                    [1357686000000, 38.66],
                    [1357772400000, 38.62],
                    [1357858800000, 38.09],
                    [1358118000000, 38.16],
                    [1358204400000, 38.15],
                    [1358290800000, 37.88],
                    [1358377200000, 37.73],
                    [1358463600000, 37.98],
                    [1358809200000, 37.95],
                    [1358895600000, 38.25],
                    [1358982000000, 38.10],
                    [1359068400000, 38.32],
                    [1359327600000, 38.24],
                    [1359414000000, 38.52],
                    [1359500400000, 37.94],
                    [1359586800000, 37.83],
                    [1359673200000, 38.34],
                    [1359932400000, 38.10],
                    [1360018800000, 38.51],
                    [1360105200000, 38.40],
                    [1360191600000, 38.07],
                    [1360278000000, 39.12],
                    [1360537200000, 38.64],
                    [1360623600000, 38.89],
                    [1360710000000, 38.81],
                    [1360796400000, 38.61],
                    [1360882800000, 38.63],
                    [1361228400000, 38.99],
                    [1361314800000, 38.77],
                    [1361401200000, 38.34],
                    [1361487600000, 38.55],
                    [1361746800000, 38.11],
                    [1361833200000, 38.59],
                    [1361919600000, 39.60],
                ]
            },

        ],
        chart: {
            id: 'chartD',
            type: 'area',
            height: 345,
            zoom: {
                autoScaleYaxis: false
            }
        },


        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        grid: {
            borderColor: '#f7f9fa ',
        },
        xaxis: {
            type: 'datetime',
            min: new Date('01 Feb 2012').getTime(),
            axisBorder: {
                show: true,
                color: 'rgba(119, 119, 142, 0.05)',
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: true,
                borderType: 'solid',
                color: 'rgba(119, 119, 142, 0.05)',
                width: 6,
                offsetX: 0,
                offsetY: 0
            },
            labels: {
                show: true,
                rotate: -90,
                style: {
                    fontSize: '11px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 400,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
            tooltip: {
                enabled: false
            }
        },
        yaxis: {
            title: {
                text: 'Growth',
                style: {
                    color: '#adb5be',
                    fontSize: '14px',
                    fontFamily: 'poppins, sans-serif',
                    fontWeight: 600,
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
            labels: {
                formatter: function(y) {
                    return y.toFixed(0) + "";
                }
            }
        },
        tooltip: {
            x: {
                format: 'dd MMM yyyy'
            }
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            colors: undefined,
            width: 1,
            dashArray: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.75,
                opacityTo: 0.5,
                stops: [0, 200]
            }
        },

        legend: {
            position: "top",
            show: true
        }
    };
    // document.getElementById('chartD').innerHTML = '';
    var chart = new ApexCharts(document.querySelector("#chartD"), options);
    chart.render();
</script>


<script src="{{ asset('vendor/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{ asset('vendor/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/js/datatable/dataTables.select.min.js') }}"></script>
<script src="{{ asset('vendor/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendor/js/datatable/dataTables.checkboxes.min.js') }}"></script>

<script src="{{ asset('vendor/js/datetime/jquery.datetimepicker.full.min.js') }}"></script>
<!-- <script src="vendor/js/ckeditor/ckeditor.js"></script> -->
<script src="{{ asset('vendor/js/tagify/tagify.min.js') }}"></script>
<script src="{{ asset('vendor/js/tagify/tagify.polyfills.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    $("body, .modal").on("scroll", function() {
        $(".selectDate, .selectTime, .startDate, .endDate").datetimepicker("hide");
    });
    $("#Select2CheckedAllList").click(function() {
        if ($("#Select2CheckedAllList").is(':checked')) { //select all
            $("#instanceSelect").find('option').prop("selected", true);
            $("#instanceSelect").trigger('change');
        } else { //deselect all
            $("#instanceSelect").find('option').prop("selected", false);
            $("#instanceSelect").trigger('change');
        }
    });
    
    $('.select-box').select2({
        theme: 'bootstrap-5',
        templateResult: formatState,
        templateSelection: formatState
        // dropdownParent: $(".modal")
        // allowClear: true
        // dropdownCssClass: "testing",
      });
    $('.select2Checkbox').select2({
        theme: 'bootstrap-5',
        templateResult: formatState,
        templateSelection: formatState,
        dropdownCssClass: "CheckboxResult",
      });
     function formatState(opt) {
        if (!opt.id) {
          return opt.text;
        }
        var optimage = $(opt.element).attr('data-image');
        if (!optimage) {
          return opt.text;
        } else {
          var $opt = $(
            '<span  class="d-flex align-items-center gap-2 flex-row-reverse justify-content-between" style="min-width:75px;"><img src="' + optimage + '" style="width:20px" /> ' + opt.text + '</span>'
          );
          return $opt;
        }
      };
        $("body").on("scroll", function() {
        $(".datetime").datetimepicker("hide");
      });
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@stack('extra-js')
</body>
<html>