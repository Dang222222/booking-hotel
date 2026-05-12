<?php
session_start();
require('../inc/db_config.php');

if (!isset($_SESSION['adminLogin'])) {
    http_response_code(403);
    exit('Unauthorized');
}

if (isset($_POST['get_general'])) {
    $res  = select("SELECT `name`, `value` FROM `settings`");
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[$row['name']] = $row['value'];
    }
    header('Content-Type: application/json');
    echo json_encode([
        'site_title' => $data['site_title'] ?? '',
        'site_about' => $data['site_about'] ?? ''
    ]);
}

if (isset($_POST['upd_general'])) {
    $f  = filteration($_POST);
    $r1 = update("UPDATE `settings` SET `value`=? WHERE `name`='site_title'", [$f['site_title']], "s");
    $r2 = update("UPDATE `settings` SET `value`=? WHERE `name`='site_about'", [$f['site_about']], "s");
    echo (($r1 + $r2) > 0) ? 1 : 0;
}