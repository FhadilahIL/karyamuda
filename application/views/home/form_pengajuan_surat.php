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
    <div class="container mb-4 mt-4">

        <h3>Form Pengajuan Surat</h3>
        <form action="<?= base_url('surat/pengajuan_surat') ?>" method="post">
            <div class="form-group">
                <label>Perihal Surat</label>
                <input type="text" name="perihal_surat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Banyak Lampiran</label>
                <input type="text" name="lampiran" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tujuan Surat</label>
                <input type="text" name="tujuan_surat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control" min="<?= date('Y-m-d', strtotime('+1 day', time())) ?>" required>
            </div>
            <div class="form-group">
                <label>Waktu Pelaksaan</label>
                <input type="time" name="waktu_pelaksanaan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tempat Pelaksanaan</label>
                <input type="text" name="tempat_pelaksanaan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jenis Surat</label>
                <select name="nama_template" class="form-control select2" required>
                    <option value="">-- Pilih Surat --</option>
                    <?php foreach ($allTemplate as $template) { ?>
                        <option value="<?= $template->nama_template ?>"><?= $template->nama_surat ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check fa-fw"></i> Buat Surat</button>
        </form>
    </div>