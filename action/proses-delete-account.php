<?php

include("../koneksi.php");

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = " DELETE FROM account WHERE id_user=$id";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        echo "<script> 
        alert('Data Berhasil Dihapus');
        document.location.href = '../views/read_account.php';
        </script>";
    }else {
        echo "<script> 
        alert('Error Nih');
        document.location.href = '../views/read_account.php';
        </script>";
    }
}
?>