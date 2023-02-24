<?php

include("../koneksi.php");

$id = $_POST['id'];
$hewan = $_POST['hewan'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE hewan SET hewan='$hewan', var_foto='$filename' WHERE id_hewan='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_hewan.php';
        </script>";
}else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}