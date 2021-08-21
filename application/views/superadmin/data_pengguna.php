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
                            <th style="min-width: 300px;">Nama Pengguna</th>
                            <th style="min-width: 150px;">Jenis Kelamin</th>
                            <th style="min-width: 150px;">Jabatan</th>
                            <th style="min-width: 100px;">Status</th>
                            <th style="min-width: 100px;">Action</th>
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
                                        <td>
                                            <?php if ($allUser->id_jabatan == '1') { ?>
                                                <a href="" class="text-warning" data-toggle="tooltip" data-placement="top" title="Reset Password"><i class="fas fa-undo fa-fw"></i></a>
                                            <?php } else { ?>
                                                <a href="" class="text-warning" data-toggle="tooltip" data-placement="top" title="Ubah Pengguna"><i class="fas fa-edit fa-fw"></i></a>
                                                <a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus Pengguna"><i class="fas fa-trash fa-fw"></i></a>
                                            <?php } ?>
                                        </td>
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