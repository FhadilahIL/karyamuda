<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Form Tambah Berita</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('berita/add_berita') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul_berita" class="form-control" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label>Upload Thumbnail</label> <br />
                            <span class="btn btn-raised btn-round btn-default btn-file">
                                <span class="fileinput-new"><i class="fas fa-upload fa-fw"></i> Select Thumbnail
                                    <input accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')" type='file' id="foto" name="thumbnail_berita" required />
                                </span>
                            </span> <br />
                            <p id="hasil" hidden>Preview Thumbnail Berita</p>
                            <img id="preview" class="mb-3 rounded" hidden />
                        </div>
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea class="summernote" name="isi_berita"></textarea>
                        </div>
                        <button class="btn btn-success btn-block"><i class="fas fa-upload"></i> Publish Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>