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
$level = $_SESSION['level'];
if ($level != 'admin') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
if( !isset($_GET['id']) ){
    echo "<script> 
    alert('Data Tidak Terkirim, Hubungi Administrator');
    document.location.href = 'read_brand.php';
    </script>";
}

$brand = $_GET['id'];
$sql = "SELECT * FROM brand WHERE id_brand=$brand";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);
if( mysqli_num_rows($query) < 1 ){
    echo "<script> 
    alert('Data Tidak Ada');
    document.location.href = 'read_brand.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Update</title>
</head>
<body>
<div class="m-md-4">
        <form action="../action/proses-update-brand.php" method="post" enctype="multipart/form-data">
            <h3>UPDATE</h3>
            <input type="hidden" name="id" value="<?php echo $data['id_brand'] ?>">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="brand" value="<?php echo $data['brand'] ?>" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contact</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="contact" value="<?php echo $data['contact'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $data['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Brand Image</label>
                <input class="form-control" type="file" id="formFile" name="file" value="<?php echo $data['var_foto'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="read_hewan.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>
</html>