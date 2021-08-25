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
<script src="<?= base_url('/') ?>assets/bootstrap/js/jquery-3.6.0.js"></script>
<script src="<?= base_url('/') ?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('/') ?>assets/bootstrap/js/bootstrap.min.js"></script>
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

<script>
    $(document).ready(function() {
        $('.select2').select2()

        $('.table-datatables').DataTable()

        $('.summernote').summernote({
            placeholder: 'Silahkan Isi Berita Anda',
            tabsize: 3,
            height: 300
        })

        let notif = $('.notifikasi').data('notif')
        if (notif != '') {
            let pesan = $('.notifikasi').data('pesan')
            showNotification(notif, pesan)
        }
    })

    function showPassword(passwordId, iconId) {
        var pass = document.getElementById(passwordId)
        if (pass.type == 'password') {
            $("#" + iconId).attr('class', 'fas fa-eye-slash');
            $("#" + passwordId).attr("type", "text");
        } else {
            $("#" + iconId).attr('class', 'fas fa-eye');
            $("#" + passwordId).attr("type", "password");
        }
    }

    let preview = document.getElementById('preview')
    let gambar = document.getElementById('foto')
    let hasil = document.getElementById('hasil')
    gambar.addEventListener('change', function() {
        if (gambar.value == '') {
            hasil.hidden = true
            preview.hidden = true
        } else {
            hasil.hidden = false
            preview.hidden = false
        }
    })

    function tampilkanPreview(gambar, preview) {
        // membuat objek gambar
        var gb = gambar.files;

        // loop untuk merender gambar
        for (var i = 0; i < gb.length; i++) {
            // bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(preview);
            var reader = new FileReader();

            if (gbPreview.type.match(imageType)) {
                // jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);

                $('.img-preview').css('display', 'block');
                // membaca data URL gambar
                reader.readAsDataURL(gbPreview);
                preview.style.width = '100%';
                preview.style.height = '400px';
            } else {
                // jika tipe data tidak sesuai
                alert("Type file tidak sesuai. Khusus image.");
            }
        }
    }

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