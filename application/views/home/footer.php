<footer class="footer footer-default">
    <div class="container">
        <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://github.com/FhadilahIL" target="_blank">Muhammad Ilham Fhadilah</a>.
        </div>
    </div>
</footer>
<!--   Core JS Files   -->
<script src="<?= base_url('/') ?>assets/bootstrap/js/jquery-3.6.0.js"></script>
<script src="<?= base_url('/') ?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('/') ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= base_url('/') ?>assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url('/') ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="<?= base_url('/') ?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('/') ?>assets/js/plugins/bootstrap-notify.js"></script>
<script src="<?= base_url('/') ?>assets/js/now-ui-kit.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        let notif = $('.notifikasi').data('notif')
        if (notif != '') {
            let pesan = $('.notifikasi').data('pesan')
            showNotification(notif, pesan)
        }
    })

    function showNotification(notif, pesan) {
        from = 'top';
        align = 'right';
        if (notif == 'berhasil') {
            color = 'success';
            icon = 'fas fa-check fa-fw';
        } else if (notif == 'info') {
            color = 'info';
            icon = 'fas fa-bell fa-fw';
        } else {
            color = 'danger';
            icon = 'fas fa-times fa-fw';
        }

        $.notify({
            icon: icon,
            message: pesan

        }, {
            type: color,
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
    }
</script>
</body>

</html>