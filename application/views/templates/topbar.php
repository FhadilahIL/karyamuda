<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <div class="container-fluid bg-warning">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <p class="navbar-brand text-white">KARANG TARUNA - KARYA MUDA</p>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if ($user->foto == 'default.svg') { ?>
                            <i class="fas fa-user fa-fw fa-3x align-middle text-white" style="margin-right: 3px;"></i>
                        <?php } else { ?>
                            <img src="<?= base_url('/assets/img/users/') . $user->foto ?>" style="width: 30px; margin-right: 4px;" alt="foto_profile">
                        <?php } ?>
                        <p class="text-white">
                            <?= $user->nama ?>, <?= $user->jabatan ?>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-warning dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?php if ($user->id_jabatan == 1) {
                            $link = base_url('superadmin/my_profile');
                        } else if ($user->id_jabatan == 2 || $user->id_jabatan == 3) {
                            $link = base_url('admin/my_profile');
                        } else if ($user->id_jabatan == 4) {
                            $link = base_url('sekretaris/my_profile');
                        } else if ($user->id_jabatan == 5) {
                            $link = base_url('bendahara/my_profile');
                        } else if ($user->id_jabatan == 6) {
                            $link = base_url('anggota/my_profile');
                        }
                        ?>
                        <a class="dropdown-item text-white" href="<?= $link ?>"><i class="fas fa-user fa-fw"></i> My Profile</a>
                        <a class="dropdown-item text-white" href="<?= base_url('auth/logout') ?>"><i class="fas fa-power-off fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->