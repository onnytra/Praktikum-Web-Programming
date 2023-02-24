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
// $sql2 = "SELECT id_user FROM account WHERE username='$username'";
// $query2 = mysqli_query($koneksi, $sql2);
// $data2 = mysqli_fetch_assoc($query2);
$level = $_SESSION['level'];
if ($level != 'user') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
$petfood = $_GET['id'];
// $sql = "SELECT id_beli FROM aksi_beli WHERE id_beli=$petfood";
// $query = mysqli_query($koneksi,$sql);
// $data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>PetFood</title>
</head>

<body>
    <div class="m-md-4">
        <form action="../action/proses-update-beli.php" method="post" enctype="multipart/form-data">
            <h3>Pembayaran</h3>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="exampleInputPassword1" name="id" value=" <?php echo $petfood?>">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                <input class="form-control" type="file" id="formFile" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="view_cart.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>

</html>