<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url('/') ?>assets/img/settings/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?= strtoupper($title . ' - ' . $settings->nama_kartun) ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/fontawesome/css/all.css" />
    <!-- CSS Files -->
    <link href="<?= base_url('/') ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/css/now-ui-dashboard.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body class="landing-page sidebar-collapse">
    <div class="notifikasi" data-notif="<?= $this->session->flashdata('notif'); ?>" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>

    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="350">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="<?= base_url() ?>" rel="tooltip" title="Designed by Invision. Coded by Muhammad Ilham Fhadilah" data-placement="bottom">
                    <img src="<?= base_url('/assets/img/settings/') . $settings->logo_kartun ?>" width="30px" style="margin-right: 5px;" alt="Logo">
                    Karang Taruna - <?= $settings->nama_kartun ?>
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?= base_url('/assets/img/settings/blurred-image.jpg') ?>">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <?php if (!$this->session->logged) { ?>
                            <a class="nav-link" href="<?= base_url('auth') ?>">Login</a>
                        <?php } else { ?>
                            <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('<?= base_url('/assets/img/settings/') . $settings->background_login ?>');">
            </div>
            <div class="content-center">
                <div class="container">
                    <h2 class="title"><?= strtoupper('Karang Taruna - ' . $settings->nama_kartun) ?></h2>
                    <div class="text-center">
                        <a href="#" class="btn btn-info btn-icon btn-round">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-icon btn-round">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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