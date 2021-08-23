<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Pengguna</h3>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal Tambah Pengguna -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengguna">
                        <i class="fas fa-plus fa-fw"></i> Tambah Data Pengguna
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus fa-fw"></i> Tambah Data Pengguna</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('user/add_user') ?>" method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" maxlength="20" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama" maxlength="100" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control select2" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select name="id_jabatan" class="form-control select2" required>
                                                <option value="">-- Pilih Jabatan --</option>
                                                <?php foreach ($allJabatan as $jabatan) { ?>
                                                    <option value="<?= $jabatan->id_jabatan ?>"><?= $jabatan->jabatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 300px;">Nama Pengguna</th>
                            <th style="min-width: 150px;">Jenis Kelamin</th>
                            <th style="min-width: 150px;">Jabatan</th>
                            <th style="min-width: 100px;">Status</th>
                            <th style="min-width: 100px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($allUser as $allUser) {
                                if ($user->id_user != $allUser->id_user) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ . '.' ?></td>
                                        <td><?= $allUser->nama ?></td>
                                        <td><?= $allUser->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' ?></td>
                                        <td><?= $allUser->jabatan ?></td>
                                        <td><?= $allUser->status == '0' ? 'Tidak Aktif' : 'Aktif' ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('user/reset_password/') . $allUser->id_user ?>" class="text-secondary" data-toggle="tooltip" data-placement="top" title="Reset Password"><i class="fas fa-undo fa-fw"></i></a>
                                            <?= $allUser->status == '1' ? '<a href="' . base_url('user/change_status/') . $allUser->id_user . '" class="text-info" data-toggle="tooltip" data-placement="top" title="Ubah Status (Tidak Aktif)"><i class="fas fa-toggle-off fa-fw"></i></a>' : '<a href="' . base_url('user/change_status/') . $allUser->id_user . '" class="text-info" data-toggle="tooltip" data-placement="top" title="Ubah Status (Aktif)"><i class="fas fa-toggle-on fa-fw"></i></a>' ?>
                                            <a href="<?= base_url('superadmin/ubah_data/') . $allUser->id_user ?>" class="text-warning" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="fas fa-edit fa-fw"></i></a>
                                            <?php if ($allUser->id_jabatan != '1') { ?>
                                                <a href="#" class="text-danger" data-toggle="modal" data-target="#modalHapusUser<?= $allUser->id_user ?>">
                                                    <i class="fas fa-trash fa-fw"></i>
                                                </a>
                                                <!-- Modal Hapus User -->
                                                <div class="modal fade" id="modalHapusUser<?= $allUser->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Hapus Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-justify">Apakah anda yakin ingin menghapus data user dengan nama <b><?= $allUser->nama ?></b> ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Tidak, Tutup</button>
                                                                <a href="<?= base_url('user/delete_user/') . $allUser->id_user ?>" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i> Ya, Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>