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


@include('admin.partials.sidebar')
@include('admin.partials.top-bar')

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
