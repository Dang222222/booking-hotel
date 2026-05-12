<?php
session_start();
if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    header('Location: dashboard.php');
    exit();
}
header('Location: login.php');
exit();
