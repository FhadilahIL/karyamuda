<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Keuangan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 100px;">Tanggal</th>
                            <th style="min-width: 400px;">User</th>
                            <th style="min-width: 300px;">Keterangan</th>
                            <th style="min-width: 150px;">Pemasukan</th>
                            <th style="min-width: 150px;">Pengeluaran</th>
                            <th style="min-width: 170px;">Saldo Akhir</th>
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Hutang -->
                    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#modalTambahHutang">
                        <i class="fas fa-plus fa-fw"></i> Tambah Data Hutang
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahHutang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus fa-fw"></i> Tambah Data Hutang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('keuangan/add_pinjaman') ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Penghutang</label>
                                            <input type="text" name="nama_peminjam" maxlength="100" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" name="jumlah_pinjaman" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" maxlength="255" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Tambah Hutang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 400px;">Nama Peminjam</th>
                            <th style="min-width: 150px;">Jumlah</th>
                            <th style="min-width: 300px;">Keterangan</th>
                            <th style="min-width: 250px;">Tanggal Peminjaman</th>
                            <th style="min-width: 150px;">Status</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($allPinjaman as $allPinjaman) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ . '.' ?></td>
                                    <td class="text-justify"><?= $allPinjaman->nama_peminjam ?></td>
                                    <td>Rp. <?= number_format($allPinjaman->jumlah_pinjaman, 2, ',', '.') ?></td>
                                    <td><?= $allPinjaman->keterangan ?></td>
                                    <td class="text-center"><?= date('l, d F Y (H:i:s)', strtotime($allPinjaman->tanggal_pinjaman)) ?></td>
                                    <td><?= $allPinjaman->status_pinjaman == 1 ? "Sudah Lunas" : "Belum Lunas" ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="mt-5 mb-3">
                        <p>Jumlah Saldo : <?= 'Rp. ' . number_format(intval($jumlahSaldo->saldo_akhir), 2, ',', '.') ?></p>
                        <p>Jumlah Pinjaman : <?= 'Rp. ' . number_format(intval($jumlahPinjaman->jumlah_pinjaman), 2, ',', '.') ?></p>
                        <p>Jumlah Saldo Saat Ini : <?= number_format($saldoSaatIni, 2, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>