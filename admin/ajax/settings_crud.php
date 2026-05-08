<?php

require('../inc/db_config.php');

session_start();


// ==========================
// CHẶN TRUY CẬP TRÁI PHÉP
// ==========================
if(!isset($_SESSION['adminLogin'])){
    exit('Unauthorized Access');
}


// ==========================
// LẤY DỮ LIỆU SETTINGS
// ==========================
if(isset($_POST['get_general']))
{
    $q = "SELECT * FROM `settings` WHERE `sr_no`=?";

    $values = [1];

    $res = select($q, $values, "i");

    $data = mysqli_fetch_assoc($res);

    echo json_encode($data);
}


// ==========================
// UPDATE SETTINGS
// ==========================
if(isset($_POST['upd_general']))
{
    $frm_data = filteration($_POST);

    $q = "UPDATE `settings`
          SET `site_title`=?,
              `site_about`=?
          WHERE `sr_no`=?";

    $values = [
        $frm_data['site_title'],
        $frm_data['site_about'],
        1
    ];

    $res = update($q, $values, "ssi");

    echo $res;
}

?>