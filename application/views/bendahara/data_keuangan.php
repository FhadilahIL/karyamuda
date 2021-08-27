<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Keuangan</h3>
                </div>
                <div class="card-body ">
                    <!-- Button trigger modal Tambah Keuangan -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKeuangan">
                        <i class="fas fa-plus fa-fw"></i> Tambah Data Keuangan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahKeuangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus fa-fw"></i> Tambah Data Keuangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('keuangan/add_keuangan') ?>" method="post">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" maxlength="255" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kas</label>
                                            <select name="jenis_kas" class="form-control select2" required>
                                                <option value="">-- Pilih Jenis Kas --</option>
                                                <option value="M">Pemasukan</option>
                                                <option value="K">Pengeluaran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" name="jumlah" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Tambah Keuangan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 100px;">Tanggal</th>
                            <th style="min-width: 400px;">User</th>
                            <th style="min-width: 300px;">Keterangan</th>
                            <th style="min-width: 150px;">Pemasukan</th>
                            <th style="min-width: 150px;">Pengeluaran</th>
                            <th style="min-width: 170px;">Saldo Akhir</th>
                            <th style="min-width: 100px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $saldoAkhir = $jumlahSaldo->saldo_akhir;
                            foreach ($allKeuangan as $allKeuangan) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ . '.' ?></td>
                                    <td class="text-center"><?= date('d F Y', strtotime($allKeuangan->tanggal)) ?></td>
                                    <td class="text-justify"><?= $allKeuangan->nama ?></td>
                                    <td><?= $allKeuangan->keterangan ?></td>
                                    <?php $saldoAwal = $saldoAkhir;
                                    if ($allKeuangan->jenis_kas == 'M') {
                                        $pemasukan = $allKeuangan->jumlah;
                                        $pengeluaran = 0;
                                        $saldoAkhir -= intval($pemasukan);
                                    } else {
                                        $pengeluaran = $allKeuangan->jumlah;
                                        $pemasukan = 0;
                                        $saldoAkhir += intval($pengeluaran);
                                    }
                                    ?>
                                    <td class="text-justify"><?= $pemasukan == 0 ? '-' : 'Rp. ' . number_format($pemasukan, 2, ',', '.') ?></td>
                                    <td class="text-justify"><?= $pengeluaran == 0 ? '-' : 'Rp. ' . number_format($pengeluaran, 2, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($saldoAwal, 2, ',', '.') ?></td>
                                    <td style="min-width: 100px;" class="text-center">
                                        <a href="<?= base_url('bendahara/ubah_keuangan/') . $allKeuangan->id_keuangan ?>" class="text-warning" data-toggle="tooltip" data-placement="top" title="Ubah Keuangan"><i class="fas fa-edit fa-fw"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#modalHapusKeuangan<?= $allKeuangan->id_keuangan ?>" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Keuangan"><i class="fas fa-trash fa-fw"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modalHapusKeuangan<?= $allKeuangan->id_keuangan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-fw"></i> Hapus Data Keuangan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-justify">Apakah anda yakin ingin menghapus data keuangan dengan keterangan <b><?= $allKeuangan->keterangan ?></b> dengan jumlah <b>Rp. <?= number_format($allKeuangan->jumlah, 2, ',', '.') ?></b> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Tidak, Tutup</button>
                                                <a href="<?= base_url('keuangan/delete_keuangan/') . $allKeuangan->id_keuangan ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus</a>
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