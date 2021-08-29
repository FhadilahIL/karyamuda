<div class="wrapper">
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('<?= base_url('/assets/img/settings/') . $settings->background_login ?>');">
        </div>
        <div class="content-center">
            <div class="container">
                <h2 class="title"><?= strtoupper('Karang Taruna - ' . $settings->nama_kartun) ?></h2>
                <div class="text-center">
                    <?php foreach ($sosmed as $sosmed) { ?>
                        <a href="<?= $sosmed['link'] ?>" class="btn btn-info btn-icon btn-round" target="_blank">
                            <i class="<?= $sosmed['icon'] ?>"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Siapa Karya Muda Itu?</h2>
                    <h5 class="description">Karya Muda adalah suatu organisasi karang taruna yang berada di kelurahan buaran, tepatnya di RT. 02 / RW. 01. Karya Muda didirikan pada tahun 2013. Hingga saat ini karang taruna Karya Muda masih berjalan dengan baik dan dikepalai oleh saudara M. Fahru Roji dan diwakilkan oleh saudara Sepri Syamsudin..</h5>
                </div>
            </div>
        </div>
    </div>
    <?php if ($team != 'belum tersedia') { ?>
        <div class="section section-team text-center">
            <div class="container">
                <h2 class="title">Here is our team</h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php foreach ($team as $team) { ?>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md mt-4 mb-3">
                                        <div>
                                            <?php if ($team['foto'] == 'default.jpg') { ?>
                                                <img src="<?= base_url('/assets/img/users/default.svg') ?>" alt="Thumbnail Image" style="width: 250px; height: 250px;" class="rounded img-fluid">
                                            <?php } else { ?>
                                                <img src="<?= base_url('/assets/img/users/') . $team['foto'] ?>" alt="Thumbnail Image" style="width: 250px; height: 250px;" class="rounded img-fluid">
                                            <?php } ?>
                                            <h4 class="title"><?= $team['nama'] ?></h4>
                                            <p class="category text-primary"><?= $team['jabatan'] ?></p>
                                            <p class="description"><?= $team['deskripsi'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>