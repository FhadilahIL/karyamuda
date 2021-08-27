<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md">
            <div class="card ">
                <div class="card-header ">
                    <h3>Data Pengguna</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-hover table-datatables">
                        <thead class="bg-warning text-light">
                            <th>No.</th>
                            <th style="min-width: 350px;">Nama Pengguna</th>
                            <th style="min-width: 150px;">Jenis Kelamin</th>
                            <th style="min-width: 200px;">Jabatan</th>
                            <th style="min-width: 100px;">Status</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($allUser as $allUser) {
                                if ($user->id_user != $allUser->id_user) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ . '.' ?></td>
                                        <td><?= $allUser->nama ?></td>
                                        <td><?= $allUser->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' ?></td>
                                        <td><?= $allUser->jabatan ?></td>
                                        <td><?= $allUser->status == '0' ? 'Tidak Aktif' : 'Aktif' ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>