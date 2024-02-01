<footer class="content-footer footer bg-footer-theme  ">
    <div class="container-xxl d-flex flex-wrap py-2 justify-content-center flex-md-row flex-column">
        <div class="mb-2 mb-md-0 text-center">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            vinhlhpc06526
        </div>

    </div>
</footer>


<!--   Core JS Files   -->
<script src="<?php __DIR__ ?>/public/assets/js/core/popper.min.js"></script>
<script src="<?php __DIR__ ?>/public/assets/js/core/bootstrap.min.js"></script>
<script src="<?php __DIR__ ?>/public/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php __DIR__ ?>/public/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php __DIR__ ?>/public/assets/js/soft-ui-dashboard.min.js"></script>