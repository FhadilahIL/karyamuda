<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>My Profile</h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($user->foto == 'default.jpg') { ?>
                                <img src="<?= base_url('/assets/img/users/default.svg') ?>" alt="Foto Profile <?= $user->nama ?>">
                            <?php } else { ?>
                                <img src="<?= base_url('/assets/img/users/') . $user->foto ?>" alt="Foto Profile <?= $user->nama ?>">
                            <?php } ?>
                            <!-- Button trigger modal Upload Foto -->
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadFoto">
                                Upload Foto Profile
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
                                            <form action="<?= base_url('user/upload_foto/' . $user->id_user) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Upload Foto Profile</label> <br />
                                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                                        <span class="fileinput-new">Select image
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
                        <div class="col-md-8">
                            <?= form_open(base_url('sekretaris/my_profile'), ['method' => 'post']) ?>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="id_user" class="form-control" value="<?= $user->id_user ?>" readonly>
                                <input type="text" name="username" class="form-control" value="<?= $user->username ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?= $user->alamat ?>">
                                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control select2">
                                    <?= $user->jenis_kelamin == 'L' ? $selected = ['selected', ''] : $selected = ['', 'selected'] ?>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" <?= $selected[0] ?>>Laki - Laki</option>
                                    <option value="P" <?= $selected[1] ?>>Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text" onclick="showPassword('password','icon-password')"><i class="fas fa-eye" id="icon-password"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm">
                                    <div class="input-group-append">
                                        <div class="input-group-text" onclick="showPassword('passwordConfirm','icon-passwordConfirm')"><i class="fas fa-eye" id="icon-passwordConfirm"></i></div>
                                    </div>
                                </div>
                                <?= form_error('passwordConfirm', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Simpan Data</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>