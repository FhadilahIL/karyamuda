<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Form Pengajuan Surat</h3>
                </div>
                <div class="card-body">
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
            </div>
        </div>
    </div>
</div>