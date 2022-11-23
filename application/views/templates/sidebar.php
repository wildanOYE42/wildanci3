<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">web rpl <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT a.id, a.menu
                    FROM user_menu a JOIN user_access_menu b
                    ON a.id = b.menu_id
                    WHERE b.role_id = $role_id
                    ORDER BY b.menu_id ASC 
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>

        <div class="sidebar-heading">
            <?= $m['menu'] ?>
        </div>

        <?php
        $menuId = $m['id'];
        $querySubMenu = " SELECT * 
        FROM user_sub_menu JOIN user_menu
         ON user_sub_menu.menu_id = user_menu.id
         WHERE user_sub_menu.menu_id = $menuId
         AND user_sub_menu.is_active = 1
         ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->