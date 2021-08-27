<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Surat Menyurat</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSurat"><i class="fas fa-plus"></i> Tambah Data Surat</button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahSurat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus fa-fw"></i> Tambah Data Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('surat/add_surat') ?>" method="post">
                                        <div class="form-group">
                                            <label>Nomor Surat</label>
                                            <input type="text" name="no_surat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan Surat</label>
                                            <input type="text" name="keterangan_surat" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Tambah Data Surat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <table class="table table-responsive table-hover table-datatables">
                            <thead class="text-center bg-warning text-light">
                                <th>No.</th>
                                <th style="min-width: 200px;">No. Surat</th>
                                <th style="min-width: 300px;" class="text-left">Keterangan Surat</th>
                                <th style="min-width: 180px;">Tanggal Surat</th>
                                <th style="min-width: 120px;">Actions</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($allSurat as $surat) { ?>
                                    <tr>
                                        <td class="text-center">.<?= $no++ ?></td>
                                        <td class="text-center"><?= $surat->no_surat ?></td>
                                        <td class="text-justify"><?= $surat->keterangan_surat ?></td>
                                        <td class="text-center"><?= date('d F Y', strtotime($surat->tanggal_surat)) ?></td>
                                        <td class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#modalUbahSurat<?= $surat->id_surat ?>" class="text-waring"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#modalHapusSurat<?= $surat->id_surat ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Ubah Data Surat -->
                                    <div class="modal fade" id="modalUbahSurat<?= $surat->id_surat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-fw"></i> Ubah Data Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('surat/change_surat/') . $surat->id_surat ?>" method="post">
                                                        <div class="form-group">
                                                            <label>Nomor Surat</label>
                                                            <input type="text" name="no_surat" class="form-control" value="<?= $surat->no_surat ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan Surat</label>
                                                            <input type="text" name="keterangan_surat" class="form-control" value="<?= $surat->keterangan_surat ?>" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tidak, Tutup</button>
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Ubah Data Surat</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Data Surat -->
                                    <div class="modal fade" id="modalHapusSurat<?= $surat->id_surat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-fw"></i> Hapus Data Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-justify">Apakah anda yakin ingin menghapus data surat <b><?= $surat->keterangan_surat ?></b> ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tidak, Tutup</button>
                                                    <a href="<?= base_url('surat/delete_surat/') . $surat->id_surat ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus Surat</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalUploadTemplate"><i class="fas fa-upload"></i> Upload Template Surat</button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalUploadTemplate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-upload fa-fw"></i> Upload Template Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('surat/upload_template_surat') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Surat</label>
                                            <input type="text" name="nama_surat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Template Surat</label> <br />
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                                <span class="fileinput-new"><i class="fas fa-upload"></i> Pilih Surat
                                                    <input accept=".doc, .docx" type='file' name="template_surat" required />
                                                </span>
                                            </span>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Tambah Template Surat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <table class="table table-responsive table-hover table-datatables">
                            <thead class="text-center bg-warning text-light">
                                <th>No.</th>
                                <th style="min-width: 350px;">Nama Surat</th>
                                <th style="min-width: 350px;" class="text-left">Nama Template</th>
                                <th style="min-width: 135px;">Actions</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($allTemplate as $template) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ . '.' ?></td>
                                        <td class="text-justfy"><?= $template->nama_surat ?></td>
                                        <td class="text-justify"><?= $template->nama_template ?></td>
                                        <td class="text-center">
                                            <a href="#" class="text-waring" data-toggle="modal" data-target="#modalChangeTemplate<?= $template->id_template_surat ?>"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#modalDeleteTemplate<?= $template->id_template_surat ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Ubah Template -->
                                    <div class="modal fade" id="modalChangeTemplate<?= $template->id_template_surat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-upload fa-fw"></i> Ubah Template Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('surat/change_template_surat/') . $template->id_template_surat ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Nama Surat</label>
                                                            <input type="text" name="nama_surat" class="form-control" value="<?= $template->nama_surat ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Upload Template Surat</label> <br />
                                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                                                <span class="fileinput-new"><i class="fas fa-upload"></i> Pilih Surat
                                                                    <input accept=".doc, .docx" type='file' name="template_surat" />
                                                                </span>
                                                            </span>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Ubah Template Surat</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Template -->
                                    <div class="modal fade" id="modalDeleteTemplate<?= $template->id_template_surat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-fw"></i> Hapus Template Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('surat/change_template_surat/') . $template->id_template_surat ?>" method="post" enctype="multipart/form-data">
                                                        <p class="text-justify">Apakah anda yakin ingin menghapus template <b><?= $template->nama_surat ?></b> ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tidak, Tutup</button>
                                                    <a href="<?= base_url('surat/delete_template_surat/') . $template->id_template_surat ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus Template Surat</a>
                                                    </form>
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
</div>