<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    echo "<script> 
            alert('You Need To Login!');
            document.location.href = 'login.php';
        </script>";
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
if ($level != 'kary') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = '../views/login.php';
        </script>";
}
include "header-k.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Beli</title>
</head>

<body>
    <div class="m-md-4">
        <h1>Data Pembelian</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id_beli, aksi_beli.tanggal, aksi_beli.total, pembayaran.status
                FROM uas_pweb.pembayaran pembayaran
                INNER JOIN uas_pweb.aksi_beli aksi_beli
                ON (pembayaran.id_pembayaran = aksi_beli.id_beli)";
                $query = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['total'] . "</td>";
                    echo "<td>" . $data['status'] . "</td>";
                    echo "<td>";
                    if ($data['status'] == "DONE"){
                    }else{
                        echo "<a href='check_bukti.php?id=" . $data['id_beli'] . "' class='btn btn-primary me-2'> Check </a>";
                    }      
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>