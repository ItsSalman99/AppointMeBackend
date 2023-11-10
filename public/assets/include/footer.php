</main>
</div>
</div>

<!-- end side bar -->

<!-- bootstrap js file -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<?php include("assets/include/partials/footer.php") ?>
<script>
  function goBack() {
    window.history.back();
  };

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
  $('.modal').on('shown.bs.modal', function(e) {
    $(this).find('.select-box').select2({
      theme: 'bootstrap-5',
      dropdownParent: $(this).find('.modal-content'),
      templateResult: formatState,
      templateSelection: formatState,
    });
    $(this).find('.select2Checkbox').select2({
      theme: 'bootstrap-5',
      dropdownParent: $(this).find('.modal-content'),
      templateResult: formatState,
      templateSelection: formatState,
      dropdownCssClass: "CheckboxResult",
    });
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


</body>

</html>