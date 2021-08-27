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
    <meta name="description" content="Karya Muda adalah suatu organisasi karang taruna yang berada di kelurahan buaran, tepatnya di RT. 02 / RW. 01. Karya Muda didirikan pada tahun 2013. Hingga saat ini karang taruna Karya Muda masih berjalan dengan baik." />
    <meta name="author" content="Karang Taruna Karya Muda" />
    <meta name="robots" content="Karang Taruna, Karya Muda, Karang Taruna Karya Muda, Karang Taruna Karya Muda Buaran, Karang Taruna Buaran" />
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