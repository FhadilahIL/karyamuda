<div class="wrapper">
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('<?= base_url('/assets/img/settings/') . $settings->background_login ?>');">
        </div>
        <div class="content-center">
            <div class="container">
                <h2 class="title"><?= strtoupper('Karang Taruna - ' . $settings->nama_kartun) ?></h2>
                <div class="text-center">
                    <?php foreach ($sosmed as $sosmed) { ?>
                        <a href="<?= $sosmed['link'] ?>" class="btn btn-info btn-icon btn-round">
                            <i class="<?= $sosmed['icon'] ?>"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <?php if ($tampil_berita != 'belum tersedia') { ?>
            <?php foreach ($tampil_berita as $data) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('/assets/img/berita/') . $data->thumbnail ?>" class="card-img-top">
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <h5 class="card-title"><?= ucwords(str_replace('-', ' ', $data->judul_berita)) ?></h5>
                                </div>
                                <div>Published By <b><?= $data->nama ?></b> on <b><?= date('l, d F Y H:i:s', strtotime($data->publish_at)) ?></b></div>
                                <div>
                                    <p class="card-text"><?= substr($data->isi_berita, 0, 100) ?>...</p>
                                </div>
                                <div>
                                    <a href="<?= base_url('tampil_berita/') . $data->id_berita ?>" class="btn btn-primary">Lihat Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <nav aria-label="Page navigation">
                <?= $this->pagination->create_links() ?>
            </nav>
        <?php } else { ?>
            <div class="text-center mb-5">
                <p>Mohon Maaf, Berita Belum Tersedia.</p>
            </div>
        <?php } ?>
    </div>