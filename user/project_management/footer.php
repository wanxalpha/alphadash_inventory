<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="" target="_blank" class="footer-link fw-bolder">AlphaDash</a>
        </div>
    </div>
    <div class="col-md" id="loadingDiv">
        <div class="demo-inline-spacing" >
            <div class="spinner-border  spinner-border-sm text-primary loadingDiv" role="status" >
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" >
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"><span id="toast_message"> </span></div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>

<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script>
    var toast_type = '<?php echo isset($_SESSION['session_toast_type']) ? $_SESSION['session_toast_type'] : null ?>';
    var toast_message = '<?php echo isset($_SESSION['session_toast_message']) ? $_SESSION['session_toast_message'] :  null ?>';
</script>
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/vendor/js/menu.js"></script>  
<!-- endbuild -->

<!-- Vendors JS -->
<script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="assets/vendor/libs/sweet-alert/dist//sweetalert2.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/general.js"></script>


<!-- Page JS -->
<script src="assets/js/dashboards-analytics.js"></script>

<script src="assets/js/extended-ui-perfect-scrollbar.js"></script>

<script src="assets/js/pages-account-settings-account.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


</body>

</html>

<?php 
    unset($_SESSION['session_toast_type']);
    unset($_SESSION['session_toast_message']);
?>