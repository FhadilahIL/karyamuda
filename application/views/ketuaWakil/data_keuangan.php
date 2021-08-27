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
                </div>
            </div>
        </div>
    </div>
</div>