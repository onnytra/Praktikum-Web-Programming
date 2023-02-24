<?php

include("../koneksi.php");

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = " DELETE FROM pet_tutor WHERE id_tutor=$id";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        echo "<script> 
        alert('Data Berhasil Dihapus');
        document.location.href = '../views/read_pettutor.php';
        </script>";
    }else {
        echo "<script> 
        alert('Error Nih');
        document.location.href = '../views/read_pettutor.php';
        </script>";
    }
}
?>