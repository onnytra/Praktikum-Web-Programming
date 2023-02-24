<?php

include("../koneksi.php");

$id = $_GET['id'];

$sql = "UPDATE pembayaran SET status='DONE' WHERE id_pembayaran='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    $sql2 = "SELECT aksi_beli.jumlah, aksi_beli.id_food, pet_food.stock
    FROM uas_pweb.aksi_beli aksi_beli
    INNER JOIN uas_pweb.pet_food pet_food
    ON (aksi_beli.id_food = pet_food.id_food)";
    $query2 = mysqli_query($koneksi, $sql2);
    $data = mysqli_fetch_assoc($query2);
    $jumlah = $data['jumlah'];
    $stock = $data['stock'];
    $nstock = $stock - $jumlah;
    $fid = $data['id_food'];
    $sql3 = "UPDATE pet_food SET stock='$nstock' WHERE id_food='$fid'";
    $query3 = mysqli_query($koneksi, $sql3);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/view_cart.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
