<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Ubah Data <small>(<?= $pengguna->nama ?>)</small></h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-3">
                            <?php if ($pengguna->foto == 'default.jpg') { ?>
                                <img src="<?= base_url('/assets/img/users/default.svg') ?>" alt="Foto Profile <?= $pengguna->nama ?>">
                            <?php } else { ?>
                                <img src="<?= base_url('/assets/img/users/') . $pengguna->foto ?>" alt="Foto Profile <?= $pengguna->nama ?>">
                            <?php } ?>
                            <!-- Button trigger modal Upload Foto -->
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadFoto">
                                <i class="fas fa-upload"></i> Upload Foto Profile
                            </button>

                            <!-- Modal Upload Foto -->
                            <div class="modal fade" id="uploadFoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Upload Foto Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('user/upload_foto/' . $pengguna->id_user) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Upload Foto Profile</label> <br />
                                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                                        <span class="fileinput-new"><i class="fas fa-upload"></i> Select image
                                                            <input accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')" type='file' id="foto" name="foto" />
                                                        </span>
                                                    </span> <br />
                                                    <p id="hasil" hidden>Preview Update Foto</p>
                                                    <img id="preview" class="mb-3 rounded" hidden />
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Close</button>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save fa-fw"></i> Simpan Foto</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?= form_open(base_url('superadmin/ubah_data/' . $pengguna->id_user), ['method' => 'post']) ?>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $pengguna->nama ?>">
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="id_user" class="form-control" value="<?= $pengguna->id_user ?>" readonly>
                                <input type="text" name="username" class="form-control" value="<?= $pengguna->username ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?= $pengguna->alamat ?>">
                                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control select2">
                                    <?= $pengguna->jenis_kelamin == 'L' ? $selected = ['selected', ''] : $selected = ['', 'selected'] ?>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" <?= $selected[0] ?>>Laki - Laki</option>
                                    <option value="P" <?= $selected[1] ?>>Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="id_jabatan" class="form-control select2">
                                    <option value="">-- Pilih Jabatan --</option>
                                    <?php foreach ($allJabatan as $jabatan) {
                                        if ($pengguna->id_jabatan == $jabatan->id_jabatan) { ?>
                                            <option value="<?= $jabatan->id_jabatan ?>" selected><?= $jabatan->jabatan ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $jabatan->id_jabatan ?>"><?= $jabatan->jabatan ?></option>
                                    <?php }
                                    } ?>
                                </select>
                                <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Ubah Data</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>