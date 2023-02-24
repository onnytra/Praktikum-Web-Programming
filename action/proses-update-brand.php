<?php

include("../koneksi.php");

$id = $_POST['id'];
$brand = $_POST['brand'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE brand SET brand='$brand', contact='$contact', email='$email', var_foto='$filename' WHERE id_brand='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_brand.php';
        </script>";
}else {
    echo "<script> 
    alert('Something Wrong');
    document.location.href = 'javascript:history.back()';
</script>";
}