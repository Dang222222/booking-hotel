<?php
$hname = 'localhost';
$uname = 'root';
$pass  = '';
$db    = 'HBWEBSITE';

$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

function filteration($data) {
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($data[$key]);
        $data[$key] = htmlspecialchars($data[$key]);
        $data[$key] = strip_tags($data[$key]);
    }
    return $data;
}

function select($sql, $values = [], $datatypes = "") {
    $con = $GLOBALS['con'];
    if (empty($values)) {
        $res = mysqli_query($con, $sql);
        if ($res === false) die("Query error: " . mysqli_error($con));
        return $res;
    }
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) die("Prepare error: " . mysqli_error($con));
    if (!empty($datatypes)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    }
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $res;
}

function insert($sql, $values = [], $datatypes = "") {
    $con = $GLOBALS['con'];
    if (empty($values)) {
        $res = mysqli_query($con, $sql);
        return $res ? mysqli_affected_rows($con) : 0;
    }
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        error_log("Prepare error: " . mysqli_error($con));
        die("Prepare error: " . mysqli_error($con));
    }
    if (!empty($datatypes)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    }
    $ok  = mysqli_stmt_execute($stmt);
    if (!$ok) {
        error_log("Execute error: " . mysqli_stmt_error($stmt));
    }
    $res = $ok ? mysqli_stmt_affected_rows($stmt) : 0;
    mysqli_stmt_close($stmt);
    return $res;
}

function update($sql, $values = [], $datatypes = "") {
    $con = $GLOBALS['con'];
    if (empty($values)) {
        $res = mysqli_query($con, $sql);
        return $res ? mysqli_affected_rows($con) : 0;
    }
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) die("Prepare error: " . mysqli_error($con));
    if (!empty($datatypes)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    }
    $ok  = mysqli_stmt_execute($stmt);
    $res = $ok ? mysqli_stmt_affected_rows($stmt) : 0;
    mysqli_stmt_close($stmt);
    return $res;
}

function delete($sql, $values = [], $datatypes = "") {
    return update($sql, $values, $datatypes);
}
?>