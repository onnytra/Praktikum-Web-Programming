<?php

include("../koneksi.php");

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE pembayaran SET status='$status' WHERE id_pembayaran='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_beli.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
