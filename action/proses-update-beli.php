<?php

include("../koneksi.php");

$id = $_POST['id'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE pembayaran SET var_foto='$filename' WHERE id_pembayaran='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/view_petfood.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
