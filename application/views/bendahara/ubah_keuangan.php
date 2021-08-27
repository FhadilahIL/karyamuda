<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Ubah Data Keuangan</h3>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md">
                            <?= form_open(base_url('bendahara/ubah_keuangan/') . $keuangan->id_keuangan, ['method' => 'post']) ?>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="hidden" name="id_keuangan" class="form-control" value="<?= $keuangan->id_keuangan ?>" readonly required>
                                <input type="text" name="keterangan" class="form-control" value="<?= $keuangan->keterangan ?>">
                                <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kas</label>
                                <select name="jenis_kas" class="form-control select2">
                                    <?= $keuangan->jenis_kas == 'M' ? $selected = ['selected', ''] : $selected = ['', 'selected'] ?>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="M" <?= $selected[0] ?>>Pemasukan</option>
                                    <option value="K" <?= $selected[1] ?>>Pengeluaran</option>
                                </select>
                                <?= form_error('jenis_kas', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" class="form-control" value="<?= $keuangan->jumlah ?>">
                                <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Ubah Data Keuangan</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>