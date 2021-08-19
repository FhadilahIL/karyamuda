<div class="sidebar" data-color="yellow">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <img class="simple-text logo-normal" src=" <?= base_url('/assets/img/settings/logo-dashboard.png') ?>" alt="Logo">
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <?php foreach ($menu as $menu) { ?>
                <li>
                    <a href="<?= $menu['link'] ?>">
                        <i class="<?= $menu['icon'] ?>"></i>
                        <p><?= $menu['label'] ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="main-panel" id="main-panel">