<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Settings</h3>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="card-body">
                            <form action="<?= base_url('settings/ubah_data/' . $settings->settings_id) ?>" method="post">
                                <div class="form-group">
                                    <label>Nama Karang Taruna</label> <br />
                                    <input type='text' name="nama_kartun" class="form-control" value="<?= $settings->nama_kartun ?>" required />
                                </div>
                                <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-save fa-fw"></i> Update Pengaturan Karang Taruna</button>
                            </form>
                            <div class="card-body">
                                <label>Logo Dashboard Karang Taruna</label> <br />
                                <img src="<?= base_url('/assets/img/settings/') . $settings->logo_sidebar ?>" alt="Logo Karang Taruna" width="100%"> <br />
                                <button type="button" data-toggle="modal" data-target="#uploadLogoDashboard" class="btn btn-warning btn-block"><i class="fas fa-upload"></i> Upload Logo Dashboard Karang Taruna</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card-body">
                            <div class="text-center">
                                <label>Logo Karang Taruna</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="<?= base_url('/assets/img/settings/') . $settings->logo_kartun ?>" alt="Logo Karang Taruna" width="50%"> <br />
                            </div>
                            <button type="button" data-toggle="modal" data-target="#uploadLogo" class="btn btn-warning btn-block"><i class="fas fa-upload"></i> Upload Logo Karang Taruna</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="text-center">
                                    <label>Background Login Karang Taruna</label>
                                </div>
                                <img src="<?= base_url('/assets/img/settings/') . $settings->background_login ?>" alt="Logo Karang Taruna" width="100%"> <br />
                                <button type="button" data-toggle="modal" data-target="#uploadBackgroundLogin" class="btn btn-warning btn-block"><i class="fas fa-upload"></i> Upload Background Login Karang Taruna</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Upload Logo -->
            <div class="modal fade" id="uploadLogo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-upload"></i> Upload Logo Karang Taruna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/upload_logo/' . $settings->settings_id) ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Upload Logo Karang Taruna</label> <br />
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Select image
                                            <input accept=".png" type='file' name="logo" required />
                                        </span>
                                    </span>
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
            <!-- Modal Upload Logo Dashboard -->
            <div class="modal fade" id="uploadLogoDashboard" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-upload"></i> Upload Sidebar Karang Taruna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/upload_logo_dashboard/' . $settings->settings_id) ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Upload Logo Dashboard Karang Taruna</label> <br />
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Select image
                                            <input accept=".png" type='file' name="logo_dashboard" required />
                                        </span>
                                    </span>
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
            <!-- Modal Upload Background Login -->
            <div class="modal fade" id="uploadBackgroundLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-upload"></i> Upload Background Karang Taruna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/upload_background_login/' . $settings->settings_id) ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Upload Background Login Karang Taruna</label> <br />
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Select image
                                            <input accept=".jpg" type='file' name="background_login" required />
                                        </span>
                                    </span>
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
    </div>
</div>
</div>