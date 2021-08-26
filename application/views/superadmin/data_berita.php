<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Berita</h3>
                </div>
                <div class="card-body ">
                    <a href="<?= base_url('superadmin/tambah_berita') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
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
                                    <td style="min-width: 100px;">
                                        <a href="<?= base_url('superadmin/ubah_berita/') . $allBerita->id_berita ?>" class="text-warning" data-toggle="tooltip" data-placement="top" title="Ubah Berita"><i class="fas fa-edit fa-fw"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#modalHapusBerita<?= $allBerita->id_berita ?>" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Berita"><i class="fas fa-trash fa-fw"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modalHapusBerita<?= $allBerita->id_berita ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-fw"></i> Hapus Data Berita</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-justify">Apakah anda yakin ingin mengghapus data berita dengan judul <b><?= $allBerita->judul_berita ?></b> yang dipublikasi oleh <b><?= $allBerita->nama ?></b> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tidak, Tutup</button>
                                                <a href="<?= base_url('berita/delete_berita/') . $allBerita->id_berita ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus Berita</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>