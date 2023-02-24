<?php

include("../koneksi.php");

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql2 = " DELETE FROM pembayaran WHERE id_pembayaran=$id";
    $query2 = mysqli_query($koneksi, $sql2);
    $sql = " DELETE FROM aksi_beli WHERE id_beli=$id";
    $query = mysqli_query($koneksi, $sql);

    if( $query && $query2){
        echo "<script> 
        alert('Data Berhasil Dihapus');
        document.location.href = '../views/view_cart.php';
        </script>";
    }else {
        echo "<script> 
        alert('Error Nih');
        document.location.href = '../views/view_cart.php';
        </script>";
    }
}
