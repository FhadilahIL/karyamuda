<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Surat Menyurat</h3>
                </div>
                <div class="card-body">
                    <div class="mb-5">
                        <table class="table table-responsive table-hover table-datatables">
                            <thead class="text-center bg-warning text-light">
                                <th>No.</th>
                                <th style="min-width: 235px;">No. Surat</th>
                                <th style="min-width: 300px;" class="text-left">Keterangan Surat</th>
                                <th style="min-width: 200px;">Tanggal Surat</th>
                                <th style="min-width: 300px;" class="text-left">User</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($allSurat as $surat) { ?>
                                    <tr>
                                        <td class="text-center">.<?= $no++ ?></td>
                                        <td class="text-center"><?= $surat->no_surat ?></td>
                                        <td class="text-justify"><?= $surat->keterangan_surat ?></td>
                                        <td class="text-center"><?= date('d F Y', strtotime($surat->tanggal_surat)) ?></td>
                                        <td class="text-justify"><?= $surat->nama ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>