<?php
session_start();
include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda Belum Login");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
if ($level == 'admin') {
    echo "Anda Login Sebagai" . $level;
} else if ($level == 'pengguna') {
    echo "Anda Login Sebagai" . $level;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <form action="aksi-login.php?op=out" method="post">
        <input type="submit" value="LOGOUT"></a>
    </form>
</body>

</html>