<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Berita</h3>
                </div>
                <div class="card-body ">
                    <a href="<?= base_url('bendahara/tambah_berita') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 400px;">Judul Berita</th>
                            <th style="min-width: 300px;">Pembuat Berita</th>
                            <th style="min-width: 200px;">Thumbnail Berita</th>
                            <th style="min-width: 170px;">Tanggal Publish</th>
                            <th style="min-width: 100px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($allBerita as $allBerita) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ . '.' ?></td>
                                    <td class="text-justify"><?= $allBerita->judul_berita ?></td>
                                    <td><?= $allBerita->nama ?></td>
                                    <td class="text-center"><img src="<?= base_url('/assets/img/berita/') . $allBerita->thumbnail ?>" style="width: 150px; height: 100px;" alt="Thumbnail<?= $allBerita->id_berita ?>"></td>
                                    <td><?= $allBerita->publish_at ?></td>
                                    <td style="min-width: 100px;" class="text-center">
                                        <a href="<?= base_url('bendahara/ubah_berita/') . $allBerita->id_berita ?>" class="text-warning" data-toggle="tooltip" data-placement="top" title="Ubah Berita"><i class="fas fa-edit fa-fw"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>