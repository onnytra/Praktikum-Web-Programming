<?php

include("../koneksi.php");

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $sql2 = "SELECT aksi_restock.jumlah, pet_food.stock, pet_food.id_food
    FROM uas_pweb.aksi_restock aksi_restock
    INNER JOIN uas_pweb.pet_food pet_food
    ON (aksi_restock.id_food = pet_food.id_food) WHERE id_restock=$id";
    $query2 = mysqli_query($koneksi, $sql2);
    $data = mysqli_fetch_assoc($query2);
    $jumlah = $data['jumlah'];
    $stock = $data['stock'];
    $nstock = $stock - $jumlah;
    var_dump($nstock);
    $fid = $data['id_food'];
    $sql3 = "UPDATE pet_food SET stock='$nstock' WHERE id_food='$fid'";
    $query3 = mysqli_query($koneksi, $sql3);
    $sql = " DELETE FROM aksi_restock WHERE id_restock=$id";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        echo "<script> 
        alert('Data Berhasil Dihapus');
        document.location.href = '../views/read_petfood.php';
        </script>";
    }else {
        echo "<script> 
        alert('Error Nih');
        document.location.href = '../views/read_restock.php';
        </script>";
    }
}
