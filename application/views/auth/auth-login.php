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
        LOGIN PAGE - <?= strtoupper($settings->nama_kartun) ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="Karya Muda adalah suatu organisasi karang taruna yang berada di kelurahan buaran, tepatnya di RT. 02 / RW. 01. Karya Muda didirikan pada tahun 2013. Hingga saat ini karang taruna Karya Muda masih berjalan dengan baik." />
    <meta name="author" content="Karang Taruna Karya Muda" />
    <meta name="robots" content="Karang Taruna, Karya Muda Login, Karang Taruna Karya Muda, Karang Taruna Karya Muda Login, Karang Taruna Buaran" />
    <meta name="google" content="notranslate" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/fontawesome/css/all.css" />
    <!-- CSS Files -->
    <link href="<?= base_url('/') ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/css/now-ui-dashboard.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body class="login-page sidebar-collapse">
    <div class="notifikasi" data-notif="<?= $this->session->flashdata('notif'); ?>" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url(<?= base_url('/assets/img/settings/') . $settings->background_login ?>)"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                        <div class="card-header text-center">
                            <div class="logo-container mt-n5 w-50">
                                <img src="<?= base_url('/assets/img/settings/') . $settings->logo_kartun ?>" alt="Logo Kartun">
                            </div>
                        </div>
                        <?= form_open(base_url('auth'), ['method' => 'post']) ?>
                        <div class="card-body">
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user fa-fw"></i>
                                    </span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>" />
                            </div>
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock fa-fw"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Login</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright" id="copyright">
                    &copy; <?= date('Y') ?> Karya Muda, Designed by
                    <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://github.com/FhadilahIL" target="_blank">Muhammad Ilham Fhadilah</a>.
                </div>
            </div>
        </footer>
    </div>
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
    <script src="<?= base_url('/') ?>assets/js/now-ui-kit.js" type="text/javascript"></script>
    <script src="<?= base_url('/') ?>assets/js/plugins/bootstrap-notify.js"></script>

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