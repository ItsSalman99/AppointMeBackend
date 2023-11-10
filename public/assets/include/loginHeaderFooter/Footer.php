<script src="vendor/js/jquery-3.6.0.min.js"></script>
<script src="vendor/js/bootstrap/popper.min.js"></script>
<script src="vendor/js/bootstrap/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
</body>

</html>