<footer class="footer">
    <div class="container-fluid">
        <div class="copyright" id="copyright">
            &copy; <?= date('Y') ?> Karya Muda, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://github.com/FhadilahIL" target="_blank">Muhammad Ilham Fhadilah</a>.
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="<?= base_url('/') ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/core/popper.min.js">
</script>
<script src="<?= base_url('/') ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chart JS -->
<script src="<?= base_url('/') ?>assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url('/') ?>assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('/') ?>assets/js/now-ui-dashboard.min.js" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('/') ?>assets/select2/js/select2.min.js" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('/') ?>assets/datatables/datatables.min.js" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('/') ?>assets/summernote/summernote-bs4.min.js" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('/') ?>assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initGoogleMaps();
        $('.select2').select2();
        $('.table-datatables').DataTable();
        $('.summernote').summernote({
            placeholder: 'Silahkan Isi Berita Anda',
            tabsize: 3,
            height: 300
        });
    });
</script>
</body>

</html>