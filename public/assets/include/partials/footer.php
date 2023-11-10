<script src="vendor/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="vendor/js/bootstrap/bootstrap.min.js"></script>
<script src="vendor/js/select2/select2.full.min.js"></script>
<script src="vendor/js/datatable/jquery.dataTables.min.js"></script>
<script src="vendor/js/datatable/dataTables.select.min.js"></script>
<script src="vendor/js/datatable/dataTables.bootstrap5.min.js"></script>
<script src="vendor/js/datatable/dataTables.checkboxes.min.js"></script>

<script src="vendor/js/datetime/jquery.datetimepicker.full.min.js"></script>
<!-- <script src="vendor/js/ckeditor/ckeditor.js"></script> -->
<script src="vendor/js/tagify/tagify.min.js"></script>
<script src="vendor/js/tagify/tagify.polyfills.min.js"></script>
<script src="assets/js/main.js "></script>
<script>
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
</script>