<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item <?php if ($page == 'hero') {
            echo 'active';
        } ?>">
            <a href="/hero" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Hero</span>
            </a>
        </li>
        <li class="sidebar-item <?php if ($page == 'gallery') {
            echo 'active';
        } ?>">
            <a href="/gallery" class='sidebar-link'>
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li class="sidebar-item <?php if ($page == 'activity') {
            echo 'active';
        } ?>">
            <a href="/activity" class='sidebar-link'>
                <i class="bi bi-newspaper"></i>
                <span>Activity</span>
            </a>
        </li>

        <div class="d-grid gap-2">
            <a class='btn btn-outline-danger mt-5' block href="<?php echo base_url(); ?>/logout">
                <i class="bi bi-lock-fill" style="padding-right: 10px"></i>Log Out
            </a>
        </div>
    </ul>
</div>