<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    echo "<script> 
    alert('Who Are You !');
    document.location.href = 'login.php';
</script>";
}
$username = $_SESSION['username'];
$sql2 = "SELECT id_user FROM account WHERE username='$username'";
$query2 = mysqli_query($koneksi, $sql2);
$data2 = mysqli_fetch_assoc($query2);
$id_user = $data2['id_user'];
$level = $_SESSION['level'];
if ($level != 'user') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
include "header-u.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Cart</title>
</head>

<body>
    <div class="m-md-4">
        <h1>Your Cart</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pet Food</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT aksi_beli.id_beli,
                aksi_beli.tanggal,
                aksi_beli.jumlah,
                aksi_beli.total,
                pet_food.nama_food,
                pembayaran.status
                FROM (aksi_beli INNER JOIN pet_food
                    ON (aksi_beli.id_food = pet_food.id_food))
                INNER JOIN pembayaran ON (pembayaran.id_pembayaran = aksi_beli.id_beli) WHERE id_user= $id_user";
                $query = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['nama_food'] . "</td>";
                    echo "<td>" . $data['jumlah'] . "</td>";
                    echo "<td>" . $data['total'] . "</td>";
                    echo "<td>" . $data['status'] . "</td>";
                    echo "<td>";
                    if ($data['status'] == "SENDING"){
                        echo "<a href='../action/proses-done-beli.php?id=" . $data['id_beli'] . "' class='btn btn-success me-2'> Done ? </a>";
                    }elseif ($data['status'] == "DONE") {                       
                    }else {
                        echo "<a href='update_beli.php?id=" . $data['id_beli'] . "' class='btn btn-success me-2'> Pembayaran </a>";
                        echo "<a href='../action/proses-delete-beli.php?id=" . $data['id_beli'] . "' class='btn btn-danger me-2'> Cancel </a>";
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
<footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#" class="btn btn-sm btn-outline-secondary">Back to top</a>
            </p>
            <p class="mb-1">Ini Footer &copy;Onny Putra Alamsyah</p>
        </div>
    </footer>

</html>