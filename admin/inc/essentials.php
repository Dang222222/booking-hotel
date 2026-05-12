<?php
function adminLogin() {
    session_start();
    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    }
}

function alert($type, $msg) {
    $alert_html = <<<ALERT
    <div class="alert alert-$type alert-dismissible fade show custom-alert" role="alert">
        $msg
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
ALERT;
    return $alert_html;
}
?>
