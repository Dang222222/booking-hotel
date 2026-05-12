<?php
$current = basename($_SERVER['PHP_SELF']);
function nav_link($href, $label, $current) {
    $active = ($current === $href) ? 'active bg-secondary' : '';
    return "<li class='nav-item'><a class='nav-link text-white $active' href='$href'>$label</a></li>";
}
?>
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top" style="z-index:999;">
    <h3 class="mb-0 h-font">TJ Hotel</h3>
    <div class="d-flex align-items-center gap-3">
        <?php if(isset($_SESSION['user_name'])): ?>
            <span class="text-white-50 small">Xin chào, <strong class="text-white"><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span>
        <?php endif; ?>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Đăng xuất</a>
    </div>
</div>

<div class="row m-0">
    <div class="col-lg-2 p-0 bg-dark border-top border-3 border-secondary" style="min-height:100vh;" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <span class="mt-2 text-secondary small fw-bold">ADMIN PANEL</span>
                <button class="navbar-toggler shadow-none mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column gap-1">
                        <?= nav_link('dashboard.php', '📊 Dashboard', $current) ?>
                        <?= nav_link('rooms.php',    '🛏 Rooms',     $current) ?>
                        <?= nav_link('bookings.php', '📋 Bookings',  $current) ?>
                        <?= nav_link('users.php',    '👤 Users',     $current) ?>
                        <?= nav_link('settings.php', '⚙️ Settings',  $current) ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
